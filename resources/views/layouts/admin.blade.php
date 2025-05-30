<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="body-bg">
    <nav class="navbar">
        <div class="container">
            <span class="navbar-title">Admin Dashboard</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-red">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
