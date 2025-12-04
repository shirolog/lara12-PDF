@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Payments</h2>
        </div>

        <div class="card-body">
            <a href="{{ route('payments.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true" title="Add New payment"></i>Add New payment</a>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Enrollment No</th>
                            <th>Paid Date</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($payments->isNotEmpty())
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $payment->enrollment->enroll_no }}</td>
                                    <td>{{ $payment->paid_date }}</td>
                                    <td>{{ $payment->amount }}</td>


                                    <td>
                                        <a href="{{ route('payments.show', $payment->id) }}" title="View payment"><button class="btn btn-info btn-sm"><i class="fas fa-eye"></i>View</button></a>
                                        <a href="{{ route('payments.edit', $payment->id) }}" title="Edit payment"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-square-o"></i>Edit</button></a>

                                        <form action="{{ route('payments.destroy', $payment->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete payment" onclick="return confirm('Confirm delete?')"><i class="fas fa-trash-o">Delete</i></button>
                                            
                                        </form>

                                        <a href="{{ route('report.report1', $payment->id) }}" title="Edit Payment"><button class="btn btn-success"><i class="fas fa-print" aria-hidden="true"></i>Print</button></a>
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
            
        
    
@endsection