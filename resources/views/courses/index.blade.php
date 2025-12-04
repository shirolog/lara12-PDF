@extends('layout')

@section('content')
    

    <div class="card">
        <div class="card-header">
            <h2>Courses Application</h2>
        </div>

        <div class="card-body">
            <a href="{{ route('courses.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true" title="Add New course"></i>Add New Course</a>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Syllabus</th>
                            <th>Duration</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($courses->isNotEmpty())
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->syllabus }}</td>
                                    <td>{{ $course->duration() }}</td>


                                    <td>
                                        <a href="{{ route('courses.show', $course->id) }}" title="View course"><button class="btn btn-info btn-sm"><i class="fas fa-eye"></i>View</button></a>
                                        <a href="{{ route('courses.edit', $course->id) }}" title="Edit course"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-square-o"></i>Edit</button></a>

                                        <form action="{{ route('courses.destroy', $course->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete course" onclick="return confirm('Confirm delete?')"><i class="fas fa-trash-o">Delete</i></button>
                                            
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