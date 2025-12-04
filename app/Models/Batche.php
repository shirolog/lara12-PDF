<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batche extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'course_id',
        'start_date',
    ];

    // coursesとのリレーション関係
    public function course() {

        return $this->belongsTo(Course::class);
    }

    // enrollmentsとのリレーション関係
    public function enrollments() {

        return $this->hasMany(Enrollment::class);
    }
}
