@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Edit Page</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('enrollments.update', $enrollment->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="enroll_no">Enroll No</label><br>
                <input type="number" name="enroll_no" class="form-control" value="{{ $enrollment->enroll_no }}" id="enroll_no"><br>
                @error('enroll_no')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <label for="batch_id">Batch</label><br>
                <select name="batch_id" class="form-control" id="batch_id">
                    @foreach($batches as $batch)
                        <option value="{{ $batch->id }}" {{ $enrollment->batch_id == $batch->id? 'selected' : ''  }}>{{ $batch->name }}</option>
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
                <input type="date" name="join_date" class="form-control" value="{{ $enrollment->join_date }}"  id="join_date"><br>
                @error('join_date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <label for="fee">Fee</label><br>
                <input type="number" name="fee" class="form-control" value="{{ $enrollment->fee }}" id="fee"><br>
                @error('fee')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <input type="submit" class="btn btn-success" value="Update"><br>
            </form>
        </div>
    </div>
            
        
    
@endsection