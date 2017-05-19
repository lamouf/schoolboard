<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * @package App
 */
class Student extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function schoolboard()
    {
        return $this->belongsTo(Schoolboard::class);
    }

    /**
     * @return mixed
     */
    public function getAverageGrades()
    {
        $grades = $this->grades()->get();
        return [
            'grades' => $grades,
            'count' =>  $grades->count()
        ];
    }
}
