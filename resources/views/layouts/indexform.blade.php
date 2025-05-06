<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Index Page')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Header Section -->
    <header class="bg-light py-4 mb-5">
        <div class="container">
            @yield('header')
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="container mb-5">
        @yield('createpart')
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    @yield('column')
                </tr>
            </thead>
            <tbody>
                    @yield('data')
            </tbody>
        </table>
    </main>

    <div class="d-flex justify-content-center">
        @yield('pagination')
    </div>

    <!-- Footer Section -->
    <footer class="bg-light py-4 mt-5">
        <div class="container text-center">
            @yield('footer')
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
