<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
   
    public function index() {

        $teachers = Teacher::all();

        return view('teachers.index', compact('teachers'));
    }

    public function create() {

        return view('teachers.create');
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

        $teacher = new teacher();

        $teacher->name = $request->input('name');
        $teacher->address = $request->input('address');
        $teacher->mobile = $request->input('mobile');
        $teacher->save();

        return redirect()->route('teachers.index')->with('flash_message', 'teacher Added!');
        
    }

    public function show(Teacher $teacher) {

        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher) {

        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher) {

        
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }


        $teacher->name = $request->input('name');
        $teacher->address = $request->input('address');
        $teacher->mobile = $request->input('mobile');
        $teacher->save();

        return redirect()->route('teachers.index')->with('flash_message', 'teacher Updated!');
        
    }

    public function destroy(Teacher $teacher) {

        $teacher->delete();

        return redirect()->route('teachers.index')->with('flash_message', 'teacher Deleted!');
    }

}
