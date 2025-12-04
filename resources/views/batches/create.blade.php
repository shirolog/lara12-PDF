@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Batches</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('batches.store') }}" method="post">
                @csrf
                <label for="name">Batch Name</label><br>
                <input type="text" name="name" class="form-control" id="name"><br>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="course_id">Course Name</label><br>
                <select class="form-control" name="course_id" id="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select><br>
                @error('course_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror            
                <label for="start_date">Start Data</label><br>
                <input type="date" name="start_date" class="form-control" id="start_date"><br>
                @error('start_date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="submit" value="Save" class="btn btn-success"><br>
            </form>
        </div>
    </div>
            
        
    
@endsection