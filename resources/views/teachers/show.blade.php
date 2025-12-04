@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Teacher Page</h2>
        </div>

        <div class="card-body">
            <h5 class="card-title">Name : {{ $teacher->name }}</h5>
            <p class="cartd-text">Address : {{ $teacher->address }}</p>
            <p class="cartd-text">Mobile : {{ $teacher->mobile }}</p>
        </div>
    </div>
            
        
    
@endsection