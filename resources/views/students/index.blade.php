@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Student Page</h2>
        </div>

        <div class="card-body">
            <a href="{{ route('students.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true" title="Add New Student"></i>Add New Student</a>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($students->isNotEmpty())
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->mobile }}</td>


                                    <td>
                                        <a href="{{ route('students.show', $student->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fas fa-eye"></i>View</button></a>
                                        <a href="{{ route('students.edit', $student->id) }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-square-o"></i>Edit</button></a>

                                        <form action="{{ route('students.destroy', $student->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('Confirm delete?')"><i class="fas fa-trash-o">Delete</i></button>
                                            
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