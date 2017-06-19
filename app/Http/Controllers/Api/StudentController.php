<?php

namespace App\Http\Controllers\Api;

use App\ {
    Http\Controllers\Controller,
    Repositories\StudentRepository
};

use Illuminate\ {
    Http\Request,
    Http\Response
};

/**
 * Class StudentController
 * @package App\Http\Controllers\Api
 */
class StudentController extends Controller
{

    /**
     * @var StudentRepository
     */
    private $studentRepository;

    /**
     * StudentController constructor.
     * @param StudentRepository $studentRepository
     */
    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {
        return $this->studentRepository->all();
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $studentId
     * @return mixed
     */
    public function getOne(Request $request, Response $response, $studentId)
    {
        return $this->studentRepository->findOne($studentId);
    }
}