@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>payment Page</h2>
        </div>

        <div class="card-body">
            <h5 class="card-title">Enrollment No : {{ $payment->enrollment->id }}</h5>
            <p class="cartd-text">Paid date : {{ $payment->paid_date }}</p>
            <p class="cartd-text">Amount : {{ $payment->amount }}</p>
        </div>
    </div>
            
        
    
@endsection