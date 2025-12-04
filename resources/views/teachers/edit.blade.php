@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Edit Page</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('teachers.update', $teacher->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="name">Name</label><br>
                <input type="text" name="name" class="form-control" id="name" value="{{ $teacher->name }}"><br>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="address">Address</label><br>
                <input type="text" name="address" class="form-control" id="address" value="{{ $teacher->address }}"><br>
                @error('address')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="mobile">Mobile</label><br>
                <input type="number" name="mobile" class="form-control" id="mobile" value="{{ $teacher->mobile }}"><br>
                @error('mobile')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="submit" class="btn btn-success" value="Update"><br>
            </form>
        </div>
    </div>
            
        
    
@endsection