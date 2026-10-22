@extends('layout')

@section('content')


    <div class="card">
        <div class="card-header">
            <h2>batches</h2>
        </div>

        <div class="card-body">
            <a href="{{ route('batches.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"
                title="Add New batch"></i>Add New batch
            </a>
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
                        @if ($batches->isNotEmpty())
                            @foreach ($batches as $batch)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $batch->name }}</td>
                                    <td>{{ $batch->course->name }}</td>
                                    <td>{{ $batch->start_date }}</td>


                                    <td class="d-flex gap-2">
                                        <a href="{{ route('batches.show', $batch->id) }}" title="View batch"><button
                                                class="btn btn-info btn-sm"><i class="fas fa-eye"></i>View</button></a>
                                        <a href="{{ route('batches.edit', $batch->id) }}" title="Edit batch"><button
                                            class="btn btn-primary btn-sm"><i
                                            class="fas fa-pencil-square-o"></i>Edit</button>
                                        </a>

                                        <form action="{{ route('batches.destroy', $batch->id) }}" method="post"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete batch"
                                                onclick="return confirm('Confirm delete?')"><i
                                                    class="fas fa-trash-o">Delete</i>
                                            </button>

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
