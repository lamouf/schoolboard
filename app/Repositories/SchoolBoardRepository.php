<?php

namespace App\Repositories;

use App\Schoolboard;

/**
 * Class SchoolBoardRepository
 * @package App\Repositories
 */
class SchoolBoardRepository
{
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
        return $this->schoolboard->where( 'id', $schoolBoardId )
                    ->with([
                        'students' => function ($query){ return $query->with(['grades']); }
                    ])->first();
    }
}