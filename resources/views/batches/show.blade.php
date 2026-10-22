@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>batches</h2>
        </div>

        <div class="card-body">
            <h5 class="card-title">Name : {{ $batch->name }}</h5>
            <p class="cartd-text">Course : {{ $batch->course->name }}</p>
            <p class="cartd-text">Start Date : {{ $batch->start_date }}</p>
        </div>
    </div>
            
        
    
@endsection