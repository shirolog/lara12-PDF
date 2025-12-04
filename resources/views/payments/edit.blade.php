@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Edit Page</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('payments.update', $payment->id) }}" method="post">
                @csrf
                @method('PUT')
                <label for="enrollment_id">Enrollment No</label><br>
                <select name="enrollment_id" class="form-control" id="enrollment_id">
                    @if($enrollments->isNotEmpty())
                        @foreach ($enrollments as $enrollment)
                            <option value="{{ $enrollment->id }}" {{ $payment->enrollment_id == $enrollment->id ? 'selected' : '' }}>
                                {{ $enrollment->enroll_no }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('enrollment_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <label for="paid_date">Paid date</label>
                <input type="date" name="paid_date" class="form-control" value="{{ $payment->paid_date }}" id="paid_date"><br>
                @error('paid_date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <label for="amount">Amount</label><br>
                <input type="number" name="amount" class="form-control" value="{{ $payment->amount }}" id="amount"><br>
                @error('amount')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="submit" class="btn btn-success" value="Update"><br>
            </form>
        </div>
    </div>
            
        
    
@endsection