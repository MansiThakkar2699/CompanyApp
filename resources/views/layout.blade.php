<!DOCTYPE html>
<html>
<head>
    <title>Company App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('companies.index') }}">Company App</a>
        <div class="ms-auto">
            <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

@yield('content')

</body>
</html>
