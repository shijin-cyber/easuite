<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        display: flex;
        min-height: 100vh;
        margin: 0;
    }

    .sidebar {
        min-width: 250px;
        max-width: 250px;
        background-color: #343a40;
        color: white;
        padding: 20px;
    }

    .sidebar a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 10px;
        border-radius: 5px;
    }

    .sidebar a:hover {
        background-color: #495057;
    }

    .content {
        flex-grow: 1;
        padding: 20px;
    }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>EASUITE</h4>
        <a href="{{ route('home') }}">Dashboard</a>
        <a href="{{ route('list', ['type' => 'customer']) }}">Customers</a>
        <a href="{{ route('list', ['type' => 'invoice']) }}">Invoices</a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-link"
                style="color: inherit; text-decoration: none; padding: 0; background: none; border: none; cursor: pointer;">
                Logout
            </button>
        </form>
    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>