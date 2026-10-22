<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
</head>
<body>
    
<div class="container">

    <div class="row">
        <div class="col-md-12">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <a class="navbar-brand" href="#">
                        <h2>Student Management Project</h2>
                    </a>

                    <!-- スマホ時のサイドバーボタン -->
                    <button class="navbar-toggler" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#sidebarMenu"
                            aria-controls="sidebarMenu"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                </div>
            </nav>

        </div>
    </div>

    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-3">

            <!-- Collapseで開閉するサイドバー -->
            <div class="collapse d-lg-block" id="sidebarMenu">
                <div class="sidebar">
                    <a href="{{ url('/students') }}" class="{{ Request::is('students*') ? 'active' : '' }}">Student</a>
                    <a href="{{ url('/teachers') }}" class="{{ Request::is('teachers*') ? 'active' : '' }}">Teacher</a>
                    <a href="{{ url('/courses') }}" class="{{ Request::is('courses*') ? 'active' : '' }}">Courses</a>
                    <a href="{{ url('/batches') }}" class="{{ Request::is('batches*') ? 'active' : '' }}">batches</a>
                    <a href="{{ url('/enrollments') }}" class="{{ Request::is('enrollments*') ? 'active' : '' }}">Enrollment</a>
                    <a href="{{ url('/payments') }}" class="{{ Request::is('payments*') ? 'active' : '' }}">Payment</a>
                </div>
            </div>

        </div>

        <!-- Main content -->
        <div class="col-md-9">

            @if(session('flash_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('flash_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')

        </div>
    </div>
</div>


<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
