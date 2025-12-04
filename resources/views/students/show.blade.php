@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Student Page</h2>
        </div>

        <div class="card-body">
            <h5 class="card-title">Name : {{ $student->name }}</h5>
            <p class="cartd-text">Address : {{ $student->address }}</p>
            <p class="cartd-text">Mobile : {{ $student->mobile }}</p>
        </div>
    </div>
            
        
    
@endsection