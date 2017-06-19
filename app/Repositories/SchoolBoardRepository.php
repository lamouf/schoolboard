<?php

namespace App\Repositories;

use App\Schoolboard;
use Illuminate\Support\Facades\DB;

/**
 * Class SchoolBoardRepository
 * @package App\Repositories
 */
class SchoolBoardRepository
{

    /**
     * @var Schoolboard
     */
    protected $schoolboard;

    /**
     * SchoolBoardRepository constructor.
     * @param Schoolboard $schoolboard
     */
    public function __construct(Schoolboard $schoolboard)
    {
        $this->schoolboard = $schoolboard;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->schoolboard->all();
    }

    /**
     * @param $schoolBoardId
     * @return mixed
     */
    public function findOne( $schoolBoardId )
    {
        return $this->schoolboard->where( 'id', $schoolBoardId )->with( ['students'] )->first();
    }


    /**
     * @return mixed
     */
    public function join()
    {
        $schoolboards = DB::table('schoolboards')
            ->join('students', 'schoolboards.id', '=', 'students.schoolboard_id')
            ->join('grades', 'students.id', '=', 'grades.student_id')
            ->select('schoolboards.*', 'students.*', 'grades.*')
            ->get();
        return $schoolboards;
    }

}