<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'syllabus',
        'duration',
    ];

    public function duration() {

        return $this->duration . "Months";
    }

    // batchesとのリレーション関係
    public function batches() {

        return $this->hasMany(Batche::class);
    }
}
