@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Course Page</h2>
        </div>

        <div class="card-body">
            <h5 class="card-title">Name : {{ $course->name }}</h5>
            <p class="cartd-text">Syllabus : {{ $course->syllabus }}</p>
            <p class="cartd-text">Duration : {{ $course->duration() }}</p>
        </div>
    </div>
            
        
    
@endsection