<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Grade
 * @package App
 */
class Grade extends Model
{

    /**
     * @var array
     */
    protected $visible = ['id' , 'grade'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
