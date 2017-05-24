<?php

namespace App\Http\Controllers;

use App\Repositories\StudentRepository;
use App\Student;
use App\Schoolboard;
use App\Repositories\SchoolBoardRepository;
use App\Http\Requests\StudentGradeFromRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

/**
 * Class SchoolboardController
 * @package App\Http\Controllers
 */
class SchoolboardController extends Controller
{
    /**
     * @param SchoolBoardRepository $schoolBoardRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(SchoolBoardRepository $schoolBoardRepository)
    {
        return view('schoolboard.index', ['schoolboards' => $schoolBoardRepository->all()]);
    }

    /**
     * @param SchoolBoardRepository $schoolBoardRepository
     * @param $schoolboardId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function students(SchoolBoardRepository $schoolBoardRepository,  $schoolboardId)
    {
        $schoolboard = $schoolBoardRepository->findOne($schoolboardId);
        if (empty($schoolboard)) {
            return redirect()->route('schoolboard.index');
        }

        return view('schoolboard.students' , [
            'schoolboard' => $schoolboard
            ]
        );
    }

    /**
     * @param StudentRepository $students
     * @param $schoolboardId
     * @param $studentId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function student( StudentRepository $students, $schoolboardId , $studentId)
    {
        $student = $students->findOne($studentId);
        if (empty($student)) {
            return redirect()->route('schoolboard.students', ['schoolboardId' => $schoolboardId]);
        }

        return  view('schoolboard.student', [
            'student'       => $student
        ]);
    }


    /**
     * @param StudentGradeFromRequest $form
     * @param StudentRepository $students
     * @return RedirectResponse
     */
    public function addGrade(StudentGradeFromRequest $form, StudentRepository $students)
    {
        $studentId = $form->input('student_id');
        $student = $students->findOne($studentId);
        $message = null;
        if (!$student->hasReachedMaxOfGrades()) {
            $form->save();
        } else {
            $message = 'You reached the max of grades per student';
        }
        return redirect()->back()->withErrors('message', $message);
    }

}
