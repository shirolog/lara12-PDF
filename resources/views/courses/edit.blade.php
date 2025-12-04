@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Edit Page</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('courses.update', $course->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="name">Name</label><br>
                <input type="text" name="name" class="form-control" id="name" value="{{ $course->name }}"><br>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="syllabus">Syllabus</label><br>
                <input type="text" name="syllabus" class="form-control" id="syllabus" value="{{ $course->syllabus }}"><br>
                @error('syllabus')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="duration">Duration</label><br>
                <input type="number" name="duration" class="form-control" id="duration" value="{{ $course->duration }}"><br>
                @error('duration')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="submit" class="btn btn-success" value="Update"><br>
            </form>
        </div>
    </div>
            
        
    
@endsection