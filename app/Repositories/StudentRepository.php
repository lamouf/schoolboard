<?php
namespace App\Repositories;

use App\Student;

/**
 * Class StudentRepository
 * @package App\Repositories
 */
class StudentRepository
{

    /**
     * @var Student
     */
    protected $students;

    /**
     * StudentRepository constructor.
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->students = $student;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->students->all();
    }

    /**
     * @param $studentId
     * @return mixed
     */
    public function findOne($studentId)
    {
        return $this->students->where( 'id', $studentId )
                    ->with([
                        'schoolboard',
                        'grades'
                    ])->first();
    }
}