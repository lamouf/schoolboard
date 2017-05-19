<?php

namespace App\Http\Controllers;

use App\Student;
use App\Schoolboard;
use App\Http\Requests\StudentGradeFromRequest;

/**
 * Class SchoolboardController
 * @package App\Http\Controllers
 */
class SchoolboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolboards = Schoolboard::all();
        return view('schoolboard.index', ['schoolboards' => $schoolboards]);
    }

    /**
     * @param $schoolboardId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function students($schoolboardId)
    {
        $schoolboard = Schoolboard::find($schoolboardId);
        if (empty($schoolboard)) {
            return redirect()->route('schoolboard.index');
        }
        $students = $schoolboard->students()->get();

        return view('schoolboard.students' , [
            'schoolboard' => $schoolboard ,
            'students' => $students
            ]
        );

    }

    /**
     * @param $schoolboardId
     * @param $studentId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function student($schoolboardId , $studentId)
    {
        $student = Student::where(['id' => $studentId , 'schoolboard_id' => $schoolboardId ])->first();
        if (empty($student)) {
            return redirect()->route('schoolboard.student', ['schoolboardId' => $schoolboardId]);
        }

        return  view('schoolboard.student', [
            'student'       => $student,
            'schoolboard'   => $student->schoolboard,
            'grades'        => $student->grades
        ]);
    }


    /**
     * @param StudentGradeFromRequest $form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addGrade(StudentGradeFromRequest $form)
    {
        $schoolboardId = $form->input('schoolboard_id');
        $studentId = $form->input('student_id');
        $student = Student::where(['id' => $studentId , 'schoolboard_id' => $schoolboardId ])->first();
        $message = null;
        if (!$student->hasReachedMaxOfGrades()) {
            $form->save();
        } else {
            $message = 'You reached the max of grades per student';
        }
//        return redirect()->route('schoolboard.student', [
//                'schoolboardId' => $schoolboardId,
//                'student_id'    => $studentId
//            ]
//        )->with('message' , $message);
        return redirect()->back()->withErrors('message', $message);
    }

}
