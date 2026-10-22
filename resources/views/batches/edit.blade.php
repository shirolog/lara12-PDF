@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Edit Page</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('batches.update', $batch->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="name">Batch Name</label><br>
                <input type="text" name="name" value="{{ $batch->name }}" class="form-control" id="name"><br>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                    <select class="form-control" name="course_id" id="course_id">
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ $batch->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                        @endforeach
                    </select><br>
                    @error('course_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                <label for="start_date">Start Data</label><br>
                <input type="date" name="start_date" value="{{ $batch->start_date }}" class="form-control" id="start_date"><br>
                @error('start_date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="submit" class="btn btn-success" value="Update"><br>
            </form>
        </div>
    </div>
            
        
    
@endsection