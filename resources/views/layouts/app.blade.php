<!DOCTYPE html>
<html>
<head>
    <title>Laundry App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Laundry App</a>
            <div>
                <a class="nav-link d-inline" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="nav-link d-inline" href="{{ route('staff.index') }}">Staff</a>
                <a class="nav-link d-inline" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html> 