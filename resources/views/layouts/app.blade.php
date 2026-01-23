<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    {{-- header menu  --}}
    @include('frontend.inc.header')

            <!-- Page Content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>
    {{-- Footer  --}}

</body>

</html>
