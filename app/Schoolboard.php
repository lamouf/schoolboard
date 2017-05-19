<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Schoolboard
 * @package App
 */
class Schoolboard extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
