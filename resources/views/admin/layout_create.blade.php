<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('styles') <!-- Ensure custom styles are inserted here -->
    <style>
      .nav-link:hover {
          background-color: #f8f9fa;
          color: #000 !important;
          transform: scale(1.05);
          transition: all 0.3s ease-in-out;
      }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- All Orders Button -->
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-house-fill"></i>Home
                    </a>
                </li>
                <!-- Pending Orders link -->
                {{-- <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('admin.dashboard', ['status' => 'pending']) }}">
                        <i class="bi bi-clock-history"></i> Pending Orders ({{ $pendingCount }})
                    </a>
                </li> --}}

                <!-- Completed Orders link -->
                {{-- <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('admin.dashboard', ['status' => 'completed']) }}">
                        <i class="bi bi-check-circle-fill"></i> Completed Orders ({{ $completedCount }})
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('admin.products.create') }}">
                        <i class="bi bi-basket"></i>Add fruits
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
      
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
