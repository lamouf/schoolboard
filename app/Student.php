<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * @property mixed schoolbord
 * @property mixed firstname
 * @property mixed lastname
 * @property mixed grades
 * @package App
 */
class Student extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function schoolboard()
    {
        return $this->belongsTo(Schoolboard::class);
    }

    /**
     * @return mixed
     */
    public function getAverageGrades()
    {
        $grades = $this->grades()->get();
        $schoolbord = $this->schoolboard()->first();
        $avg = 0;
        if ($schoolbord->isCsm()) {
            $avg = $grades->avg('grade');
        } else {
            if ($schoolbord->isCsmb()) {
                $avg = $grades->sortByDesc('grade')->slice(0, Schoolboard::CSMB_NUMBER_OF_GRADES)->avg('grade');
            }
        }
        return ['avg' => $avg , 'succeeded' => ($avg >= Schoolboard::MINIMAL_GRADE_TO_PASS) ? 1 : 0 ];
    }

    /**
     * @return string
     */
    public function fullName()
    {
        return sprintf('%s %s', ucfirst($this->firstname) , ucfirst($this->lastname));
    }

    /**
     * @return bool
     */
    public function hasReachedMaxOfGrades() {
        return ($this->grades->count() >= Schoolboard::MAXIMAL_GRADES_FOR_STUDENT) ? true : false;
    }


}
