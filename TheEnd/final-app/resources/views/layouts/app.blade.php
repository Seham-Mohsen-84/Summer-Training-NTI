<!DOCTYPE html>
<html>
<head>
    <!--  - Placeholder for page title, default is 'Laravel App' -->
    <title>@yield('title', 'Laravel App')</title>

    <!--  - Loads compiled CSS and JavaScript files -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<!--  - Includes the navbar partial file -->
@include('layouts.navbar')

<!-- Main content area -->
<main class="py-4">
    <!--  - Placeholder for main page content -->
    @yield('content')
</main>
</body>
</html>
