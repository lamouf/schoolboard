<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SchoolBoardRepository;
use App\Http\Controllers\Controller;

/**
 * Class SchoolBoardController
 * @package App\Http\Controllers\Api
 */
class SchoolBoardController extends Controller
{

    /**
     * @var SchoolBoardRepository
     */
    protected $schoolBoardRepository;

    /**
     * SchoolBoardController constructor.
     * @param $schoolBoardRepository
     */
    public function __construct(SchoolBoardRepository $schoolBoardRepository)
    {
        $this->schoolBoardRepository = $schoolBoardRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->schoolBoardRepository->all();
    }


    /**
     * @param $schoolboardId
     * @return mixed
     */
    public function getOne( $schoolboardId )
    {
        return $this->schoolBoardRepository->findOne( $schoolboardId );
    }


}
