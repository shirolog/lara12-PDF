@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Student Page</h2>
        </div>

        <div class="card-body">
            <h5 class="card-title">Enrollment Number : {{ $enrollment->enroll_no }}</h5>
            <p class="cartd-text">Batch : {{ $enrollment->batche->name }}</p>
            <p class="cartd-text">Student : {{ $enrollment->student->name }}</p>
            <p class="cartd-text">Join Date : {{ $enrollment->join_date }}</p>
            <p class="cartd-text">Fee : {{ $enrollment->fee }}</p>
        </div>
    </div>
            
        
    
@endsection