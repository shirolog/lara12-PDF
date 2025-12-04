<?php

namespace App\Http\Controllers;

use App\Models\Batche;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class EnrollmentController extends Controller
{
    public function index() {

        
        $enrollments = Enrollment::with('batche', 'student')->get();

        return view('enrollments.index', compact('enrollments'));
    }

    public function create() {
        
        $batches = Batche::all();
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

        return redirect()->route('enrollments.index')->with('flash_message', 'enrollment Added!');
        
    }

    public function show(Enrollment $enrollment) {

        $enrollment = $enrollment->load('batche', 'student');

        return view('enrollments.show', compact('enrollment'));
    }

    public function edit(Enrollment $enrollment) {

        $batches = Batche::all();
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

        return redirect()->route('enrollments.index')->with('flash_message', 'enrollment Updated!');
        
    }

    public function destroy(Enrollment $enrollment) {

        $enrollment->delete();

        return redirect()->route('enrollments.index')->with('flash_message', 'enrollment Deleted!');

    }

}
