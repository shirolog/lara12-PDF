<?php

namespace App\Http\Controllers;

use App\Models\batch;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class EnrollmentController extends Controller
{
    public function index() {

        
        $enrollments = Enrollment::with('batch', 'student')->get();

        return view('enrollments.index', compact('enrollments'));
    }

    public function create() {
        
        $batches = batch::all();
        $students = Student::all();

        return view('enrollments.create', compact('batches', 'students'));
    }

    public function store(Request $request) {

                
        $validator = Validator::make($request->all(), [

            'enroll_no' => 'required',
            'batch_id' => 'required',
            'student_id' => 'required',
            'join_date' => 'required',
            'fee' => 'required',
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $enrollment = new Enrollment();

        $enrollment->enroll_no = $request->input('enroll_no');
        $enrollment->batch_id = $request->input('batch_id');
        $enrollment->student_id = $request->input('student_id');
        $enrollment->join_date = $request->input('join_date');
        $enrollment->fee = $request->input('fee');
        $enrollment->save();

        return redirect()->route('enrollments.index')->with('flash_message', 'Enrollment Added!');
        
    }

    public function show(Enrollment $enrollment) {

        $enrollment = $enrollment->load('batch', 'student');

        return view('enrollments.show', compact('enrollment'));
    }

    public function edit(Enrollment $enrollment) {

        $batches = batch::all();
        $students = Student::all();

        return view('enrollments.edit', compact('enrollment', 'batches', 'students'));
    }

    public function update(Request $request, Enrollment $enrollment) {

        $validator = Validator::make($request->all(), [

            'enroll_no' => 'required',
            'batch_id' => 'required',
            'student_id' => 'required',
            'join_date' => 'required',
            'fee' => 'required',
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }


        $enrollment->enroll_no = $request->input('enroll_no');
        $enrollment->batch_id = $request->input('batch_id');
        $enrollment->student_id = $request->input('student_id');
        $enrollment->join_date = $request->input('join_date');
        $enrollment->fee = $request->input('fee');
        $enrollment->save();

        return redirect()->route('enrollments.index')->with('flash_message', 'Enrollment Updated!');
        
    }

    public function destroy(Enrollment $enrollment) {

        $enrollment->delete();

        return redirect()->route('enrollments.index')->with('flash_message', 'Enrollment Deleted!');

    }

}
