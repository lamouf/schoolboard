<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Schoolboard
 * @package App
 * @property mixed name
 */
class Schoolboard extends Model
{

    const CSM = 'CSM';
    const CSMB = 'CSMB';
    const CSMB_NUMBER_OF_GRADES = 2;
    const MINIMAL_GRADE_TO_PASS = 7;
    const MAXIMAL_GRADES_FOR_STUDENT = 4;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    /**
     * @return bool
     */
    public function isCsm()
    {
        return ($this->name == self::CSM) ? true : false;
    }


    /**
     * @return bool
     */
    public function isCsmb()
    {
        return ($this->name == Schoolboard::CSMB) ? true : false;
    }
}
