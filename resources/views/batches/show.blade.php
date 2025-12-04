@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Batches</h2>
        </div>

        <div class="card-body">
            <h5 class="card-title">Name : {{ $batche->name }}</h5>
            <p class="cartd-text">Course : {{ $batche->course->name }}</p>
            <p class="cartd-text">Start Date : {{ $batche->start_date }}</p>
        </div>
    </div>
            
        
    
@endsection