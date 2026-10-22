<?php

namespace App\Http\Controllers;

use App\Models\batch;
use App\Models\Batch as ModelsBatch;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::with('course')->get();

        return view('batches.index', compact('batches'));
    }

    public function create()
    {
        $courses = Course::all();

        return view('batches.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'course_id' => 'required',
            'start_date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $batch = new batch();

        $batch->name = $request->input('name');
        $batch->course_id = $request->input('course_id');
        $batch->start_date = $request->input('start_date');
        $batch->save();

        return redirect()->route('batches.index')->with('flash_message', 'Batch Added!');
    }

    public function show(batch $batch)
    {
        $batch->load('course');

        return view('batches.show', compact('batch'));
    }

    public function edit(batch $batch)
    {
        $courses = Course::all();

        return view('batches.edit', compact('batch', 'courses'));
    }

    public function update(Request $request, batch $batch)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'course_id' => 'required',
            'start_date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $batch->name = $request->input('name');
        $batch->course_id = $request->input('course_id');
        $batch->start_date = $request->input('start_date');
        $batch->save();

        return redirect()->route('batches.index')->with('flash_message', 'Batch Updated!');
    }

    public function destroy(batch $batch)
    {
        $batch->delete();

        return redirect()->route('batches.index')->with('flash_message', 'Batch Deleted!');
    }
}
