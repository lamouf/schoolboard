<?php
namespace App\Repositories;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Mail\Mailer;

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
    public function __construct(Student $student )
    {
        $this->students = $student;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all()
    {
        return $this->students->with(['schoolboard', 'grades' ])->paginate(5);
    }

    /**
     * @param $studentId
     * @return mixed
     */
    public function findOne($studentId)
    {
        return $this->students->with([ 'schoolboard', 'grades' ])->findOrFail($studentId);
    }
}