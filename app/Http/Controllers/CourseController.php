<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index() {

        $courses  = Course::all();

        return view('courses.index', compact('courses'));
    }

    
    public function create() {

        return view('courses.create');
    }

    
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'syllabus' => 'required',
            'duration' => 'required',
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $course = new Course();

        $course->name = $request->input('name');
        $course->syllabus = $request->input('syllabus');
        $course->duration = $request->input('duration');
        $course->save();

        return redirect()->route('courses.index')->with('flash_message', 'Course Added!');
        
    }

    public function show(Course $course) {

        return view('courses.show', compact('course'));

    }

    public function edit(Course $course) {


        return view('courses.edit', compact('course'));

    }

    public function update(Request $request, Course $course) {

        
        
        $validator = Validator::make($request->all(), [
            
            'name' => 'required',
            'syllabus' => 'required',
            'duration' => 'required',
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }


        $course->name = $request->input('name');
        $course->syllabus = $request->input('syllabus');
        $course->duration = $request->input('duration');
        $course->save();

        return redirect()->route('courses.index')->with('flash_message', 'Course Updated!');
    }

    public function destroy(Course $course) {

        
        $course->delete();

        return redirect()->route('courses.index')->with('flash_message', 'Course Deleted!');
    }
}
