<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index() {

        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function create() {

        return view('students.create');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $student = new Student();

        $student->name = $request->input('name');
        $student->address = $request->input('address');
        $student->mobile = $request->input('mobile');
        $student->save();

        return redirect()->route('students.index')->with('flash_message', 'Student Added!');
        
    }

    public function show(Student $student) {

        return view('students.show', compact('student'));
    }

    public function edit(Student $student) {

        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student) {

        
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }


        $student->name = $request->input('name');
        $student->address = $request->input('address');
        $student->mobile = $request->input('mobile');
        $student->save();

        return redirect()->route('students.index')->with('flash_message', 'Student Updated!');
        
    }

    public function destroy(Student $student) {

        $student->delete();

        return redirect()->route('students.index')->with('flash_message', 'Student Deleted!');
    }
    
}
