<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [

        'enroll_no',
        'batch_id',
        'student_id',
        'join_date',
        'fee',
    ];

    // batcheとのリレーション関係
    public function batche() {

        return $this->belongsTo(Batche::class, 'batch_id');
    }

    // studentとのリレーション関係
    public function student() {

        return $this->belongsTo(Student::class);
    }

    //paymentsとのリレーション関係
    public function payments() {

        return $this->hasMany(Payment::class);
    }
}
