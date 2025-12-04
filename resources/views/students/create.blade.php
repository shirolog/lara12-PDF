@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Student Page</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('students.store') }}" method="post">
                @csrf
                <label for="name">Name</label><br>
                <input type="text" name="name" class="form-control" id="name"><br>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="address">Address</label><br>
                <input type="text" name="address" class="form-control" id="address"><br>
                @error('address')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="mobile">Mobile</label><br>
                <input type="number" name="mobile" class="form-control" id="mobile"><br>
                @error('mobile')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="submit" value="Save" class="btn btn-success"><br>
            </form>
        </div>
    </div>
            
        
    
@endsection