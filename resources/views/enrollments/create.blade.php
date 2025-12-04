@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Enrollment Page</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('enrollments.store') }}" method="post">
                @csrf
                <label for="enroll_no">Enroll No</label><br>
                <input type="number" name="enroll_no" class="form-control" id="enroll_no"><br>
                @error('enroll_no')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="batch_id">Batch</label><br>
                <select name="batch_id" class="form-control" id="batch_id">
                    @foreach($batches as $batch)
                        <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                    @endforeach
                </select><br>
                @error('batch_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="student_id">Student</label><br>
                <select name="student_id" class="form-control" id="student_id">
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select><br>
                @error('student_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <label for="join_date">Join Date</label><br>
                <input type="date" name="join_date" class="form-control" id="join_date"><br>
                @error('join_date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <label for="fee">Fee</label><br>
                <input type="number" name="fee" class="form-control" id="fee"><br>
                @error('fee')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                
                <input type="submit" value="Save" class="btn btn-success"><br>
            </form>
        </div>
    </div>
            
        
    
@endsection