<?php

namespace App\Http\Controllers;

use App\Models\Batche;
use App\Models\Course;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BatcheController extends Controller
{
    public function index() {



        $batches = Batche::with('course')->get();

        return view('batches.index', compact('batches'));
    }

    public function create() {

        $courses = Course::all();

        return view('batches.create', compact('courses'));
    }

    public function store(Request $request) {

        
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'course_id' => 'required',
            'start_date' => 'required'
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $batche = new Batche();

        $batche->name = $request->input('name');
        $batche->course_id = $request->input('course_id');
        $batche->start_date = $request->input('start_date');
        $batche->save();

        return redirect()->route('batches.index')->with('flash_message', 'batche Added!');
        
    }

    public function show(Batche $batche) {

        $batche->load('course');

        return view('batches.show', compact('batche'));
    }

    public function edit(Batche $batche) {

        $courses = Course::all();


        return view('batches.edit', compact('batche', 'courses'));
    }


    public function update(Request $request, Batche $batche) {

        
        
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'course_id' => 'required',
            'start_date' => 'required'
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }


        $batche->name = $request->input('name');
        $batche->course_id = $request->input('course_id');
        $batche->start_date = $request->input('start_date');
        $batche->save();

        return redirect()->route('batches.index')->with('flash_message', 'batche Updated!');
    }

    public function destroy(Batche $batche) {

        $batche->delete();

        return redirect()->route('batches.index')->with('flash_message', 'batche Deleted!');
    }



}
