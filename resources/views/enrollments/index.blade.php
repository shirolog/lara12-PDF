@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Enrollment Application</h2>
        </div>

        <div class="card-body">
            <a href="{{ route('enrollments.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true" title="Add New enrollment"></i>Add New Enrollment</a>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Enroll no</th>
                            <th>Batch</th>
                            <th>Student</th>
                            <th>Join Date</th>
                            <th>Fee</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($enrollments->isNotEmpty())
                            @foreach($enrollments as $enrollment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $enrollment->enroll_no }}</td>
                                    <td>{{ $enrollment->batche->name }}</td>
                                    <td>{{ $enrollment->student->name }}</td>
                                    <td>{{ $enrollment->join_date }}</td>
                                    <td>{{ $enrollment->fee }}</td>


                                    <td>
                                        <a href="{{ route('enrollments.show', $enrollment->id) }}" title="View enrollment"><button class="btn btn-info btn-sm"><i class="fas fa-eye"></i>View</button></a>
                                        <a href="{{ route('enrollments.edit', $enrollment->id) }}" title="Edit enrollment"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-square-o"></i>Edit</button></a>

                                        <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete enrollment" onclick="return confirm('Confirm delete?')"><i class="fas fa-trash-o">Delete</i></button>
                                            
                                        </form>
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