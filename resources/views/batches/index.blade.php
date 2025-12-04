@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Batches</h2>
        </div>

        <div class="card-body">
            <a href="{{ route('batches.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true" title="Add New batche"></i>Add New batche</a>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Start Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($batches->isNotEmpty())
                            @foreach($batches as $batche)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $batche->name }}</td>
                                    <td>{{ $batche->course->name }}</td>
                                    <td>{{ $batche->start_date }}</td>


                                    <td>
                                        <a href="{{ route('batches.show', $batche->id) }}" title="View batche"><button class="btn btn-info btn-sm"><i class="fas fa-eye"></i>View</button></a>
                                        <a href="{{ route('batches.edit', $batche->id) }}" title="Edit batche"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-square-o"></i>Edit</button></a>

                                        <form action="{{ route('batches.destroy', $batche->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete batche" onclick="return confirm('Confirm delete?')"><i class="fas fa-trash-o">Delete</i></button>
                                            
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