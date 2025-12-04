@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Teachers Page</h2>
        </div>

        <div class="card-body">
            <a href="{{ route('teachers.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true" title="Add New teacher"></i>Add New Teacher</a>
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
                        @if($teachers->isNotEmpty())
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->address }}</td>
                                    <td>{{ $teacher->mobile }}</td>


                                    <td>
                                        <a href="{{ route('teachers.show', $teacher->id) }}" title="View teacher"><button class="btn btn-info btn-sm"><i class="fas fa-eye"></i>View</button></a>
                                        <a href="{{ route('teachers.edit', $teacher->id) }}" title="Edit teacher"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-square-o"></i>Edit</button></a>

                                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete teacher" onclick="return confirm('Confirm delete?')"><i class="fas fa-trash-o">Delete</i></button>
                                            
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