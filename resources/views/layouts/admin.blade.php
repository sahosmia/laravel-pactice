<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white hidden md:flex flex-col">
            <div class="h-16 flex items-center justify-center text-xl font-bold border-b border-gray-700">
                Admin Panel
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2">
                {{-- <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded bg-gray-800 hover:bg-gray-700">
                    Dashboard
                </a> --}}
                {{-- <a href="{{ route('users.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                    Users
                </a> --}}
                <a href="{{ route('categories.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                    Categories
                </a>
                <a href="{{ route('brands.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                    Brands
                </a>
                <a href="{{ route('products.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                    Products
                </a>
                <a href="{{ route('tags.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                    Tags
                </a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">
                    Settings
                </a>
            </nav>

            <div class="p-4 border-t border-gray-700">
                <button class="w-full px-4 py-2 bg-red-600 rounded hover:bg-red-700">
                    Logout
                </button>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Header -->
            <header class="h-16 bg-white shadow flex items-center justify-between px-6">
                <h1 class="text-lg font-semibold text-gray-700">
                    Dashboard
                </h1>

                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">Admin</span>
                    <img src="https://ui-avatars.com/api/?name=Admin" class="w-8 h-8 rounded-full" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>

        </div>
    </div>
</body>

</html>
