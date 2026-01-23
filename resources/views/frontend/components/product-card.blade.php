@props(['product', 'categoryName' => 'Electronics'])

<div {{ $attributes->merge(['class' => 'group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl
    transition-all duration-300 flex flex-col h-full overflow-hidden']) }}>

    <div class="relative bg-gray-50 aspect-square flex items-center justify-center overflow-hidden">
        <div class="absolute top-3 left-3 z-10">
            <span class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-md uppercase">New</span>
        </div>

        <div
            class="absolute top-3 right-3 flex flex-col gap-2 z-10 transform translate-x-12 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300">
            <button
                class="bg-white p-2.5 rounded-full shadow-lg hover:bg-red-500 hover:text-white transition-all transform hover:scale-110"
                title="Wishlist">
                <i class="fa-regular fa-heart"></i>
            </button>
            <button
                class="bg-white p-2.5 rounded-full shadow-lg hover:bg-indigo-500 hover:text-white transition-all transform hover:scale-110"
                title="Compare">
                <i class="fa-solid fa-arrows-rotate"></i>
            </button>
        </div>

        <div class="text-6xl text-gray-200 group-hover:scale-110 transition-transform duration-500">
            <i class="fa-solid fa-mobile-screen-button"></i>
        </div>
    </div>

    <div class="p-5 flex flex-col flex-grow">
        <span class="text-[10px] text-indigo-500 font-bold uppercase tracking-widest mb-1">{{ $categoryName }}</span>
        <h3 class="text-gray-800 font-semibold mb-2 line-clamp-2 hover:text-indigo-600 cursor-pointer">
            {{ $product['name'] }}
        </h3>

        <div class="mt-auto">
            <div class="flex items-baseline gap-2 mb-4">
                <span class="text-xl font-bold text-gray-900">${{ number_format($product['price'], 2) }}</span>
                <span class="text-sm text-gray-400 line-through">${{ number_format($product['price'] + 100, 2) }}</span>
            </div>

            <div class="grid grid-cols-1 gap-2">
                <button
                    class="flex items-center justify-center gap-2 bg-gray-900 text-white py-2.5 rounded-xl font-medium hover:bg-indigo-600 transition-all active:scale-95">
                    <i class="fa-solid fa-cart-plus"></i> Add to Cart
                </button>
                <button
                    class="text-indigo-600 bg-indigo-50 py-2.5 rounded-xl font-semibold hover:bg-indigo-100 transition-all active:scale-95">
                    Buy Now
                </button>
            </div>
        </div>
    </div>
</div>
