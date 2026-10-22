<?php

use App\Http\Controllers\batchController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/students');

Route::prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/create', [StudentController::class, 'store'])->name('students.store');
    Route::get('/show/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/edit/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
});


Route::prefix('teachers')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('/create', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/show/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
    Route::get('/edit/{teacher}', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::put('/edit/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
});


Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/create', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/show/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/edit/{course}', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/edit/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
});

Route::prefix('batches')->group(function () {
    Route::get('/', [batchController::class, 'index'])->name('batches.index');
    Route::get('/create', [batchController::class, 'create'])->name('batches.create');
    Route::post('/create', [batchController::class, 'store'])->name('batches.store');
    Route::get('/show/{batch}', [batchController::class, 'show'])->name('batches.show');
    Route::get('/edit/{batch}', [batchController::class, 'edit'])->name('batches.edit');
    Route::put('/edit/{batch}', [batchController::class, 'update'])->name('batches.update');
    Route::delete('/{batch}', [batchController::class, 'destroy'])->name('batches.destroy');
});

Route::prefix('enrollments')->group(function () {
    Route::get('/', [EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::get('/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
    Route::post('/create', [EnrollmentController::class, 'store'])->name('enrollments.store');
    Route::get('/show/{enrollment}', [EnrollmentController::class, 'show'])->name('enrollments.show');
    Route::get('/edit/{enrollment}', [EnrollmentController::class, 'edit'])->name('enrollments.edit');
    Route::put('/edit/{enrollment}', [EnrollmentController::class, 'update'])->name('enrollments.update');
    Route::delete('/{enrollment}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');
});


Route::prefix('payments')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/create', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/show/{payment}', [PaymentController::class, 'show'])->name('payments.show');
    Route::get('/edit/{payment}', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::put('/edit/{payment}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');

});

Route::prefix('report')->group(function () {
    
    Route::get('/report1/{payment}', [ReportController::class, 'report1'])->name('report.report1');


});
