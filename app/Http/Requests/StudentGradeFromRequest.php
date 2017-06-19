<?php

namespace App\Http\Requests;

use App\ {
    Grade ,
    Student ,
    Services\DataConverter
};
use Illuminate\ {
    Support\Facades\Log ,
    Foundation\Http\FormRequest
};

/**
 * @property mixed schoolboard_id
 * @property mixed student_id
 * @property mixed grade
 */
class StudentGradeFromRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'schoolboard_id'    => 'required|int',
            'student_id'        => 'required|int',
            'grade'             => 'required|int|min:0|max:10'
        ];
    }

    /**
     * @return mixed
     */
    public function save()
    {
        $student = Student::where(['schoolboard_id' => $this->schoolboard_id, 'id' => $this->student_id ])->first();
        if (!empty($student)) {
            $grade = new Grade();
            $grade->setAttribute('student_id', $this->student_id);
            $grade->setAttribute('grade' , $this->grade);
            $saved = $student->grades()->save($grade);

            if ($saved) {
                $grades = array_column($student->grades()->get()->toArray(), 'grade');
                $result = $student->getAverageGrades();
                $data = [
                    'id'        => $student->id,
                    'name'      => $student->full_name,
                    'grades'    => $grades,
                    'average'   => $result['avg'],
                    'final'     => ($result['succeeded']) ? 'Success' : 'Fail'
                ];
                $content = json_encode($data);
                if ($student->schoolboard->isCsmb()) {
                    $content = DataConverter::convertToXml($data);
                }
                Log::info($content);
            }
            return $saved;
        }
    }

}
