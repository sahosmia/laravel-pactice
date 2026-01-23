<header class="border-b bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3">

        {{-- Left: Logo + Categories --}}
        <div class="flex items-center gap-6">
            {{-- Logo --}}
            <a href="/" class="text-xl font-bold text-gray-800">
                MyShop
            </a>

            {{-- Category list --}}
            <ul class="hidden items-center gap-4 md:flex">
                @foreach ($categories as $category)
                <li>
                    <a href="{{ route('categories.show', $category) }}"
                        class="text-sm font-medium text-gray-600 hover:text-gray-900">
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        {{-- Center: Search --}}
        <div class="flex-1 px-6">
            <form action="{{ route('search') }}" method="GET" class="relative mx-auto max-w-md">
                <input type="text" name="query" placeholder="Search products..." required
                    class="w-full rounded-lg border border-gray-300 py-2 pl-4 pr-10 text-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                <button type="submit"
                    class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 hover:text-indigo-600">
                    🔍
                </button>
            </form>
        </div>

        {{-- Right: Actions --}}
        <div class="flex items-center gap-4">
            {{-- Wishlist --}}
            <a href="#" class="text-gray-600 hover:text-gray-900">
                ❤️
            </a>

            {{-- Cart --}}
            <a href="#" class="relative text-gray-600 hover:text-gray-900">
                🛒
                <span class="absolute -right-2 -top-2 rounded-full bg-red-500 px-1.5 text-xs text-white">
                    2
                </span>
            </a>

            {{-- Login / Account --}}
            @auth
            <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900">
                Account
            </a>
            @else
            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-700">
                Login
            </a>
            @endauth
        </div>

    </nav>
</header>
