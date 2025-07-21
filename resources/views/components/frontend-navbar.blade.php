<nav class="container flex justify-between items-center py-2">
    <div>
      <a href="{{ route('home') }}">
          <img class="h-[50px] scale-150" src="{{ Storage::url('public/logo.png') }}" alt="logo">
      </a>
    </div>
    <div class="relative w-[300px]">
        <form action="{{ route('compare') }}" method="get" class="flex items-center">
            <input
                class="w-full px-4 py-2 pr-10 rounded-full border-2 border-transparent bg-gray-100 focus:bg-white focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all duration-300 shadow-sm placeholder-gray-400"
                type="text"
                name="q"
                id="search-input"
                placeholder="Search products..."
            >
            <button
                type="submit"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-pink-500 hover:text-pink-600 focus:outline-none"
            >
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <div class="flex gap-2 items-center">
        @if (!Auth::user())
            <a href="{{ route('register') }}" class="btn-primary">SignUp</a>
            <a href="{{ route('login') }}" class="btn-secondary">Login</a>
        @else
            <a href="{{ route('carts') }}">
               <i class="fa-solid fa-cart-shopping"></i>
            </a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <i class="fa-solid fa-user"></i>
            </form>
        @endif
    </div>
</nav>

<style>
    /* Ensure btn-primary and btn-secondary are styled consistently */
    .btn-primary {
        @apply bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition-colors;
    }
    .btn-secondary {
        @apply bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors;
    }

    /* Responsive adjustments */
    @media (max-width: 640px) {
        .container {
            @apply flex-col gap-4;
        }
        .w-[300px] {
            @apply w-full;
        }
        .flex.items-center {
            @apply w-full justify-center;
        }
    }
</style>

