<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashNova - Ultra Modern Dashboard</title>
    @include('includes.styles')
    @stack('styles')
</head>
<body class="cosmic-bg min-h-screen text-white">
    <!-- Sidebar -->
    @include('partials.sidebar')

    

    <!-- Main Content -->
    <div class="lg:ml-72">
       @include('partials.navbar')

        <!-- Dashboard Content -->
        <main class="md:p-8 p-3">
            @yield('content')
        </main>
    </div>
    @include('sweetalert::alert')
    @include('includes.scripts')
    @stack('scripts')
</body>
</html>