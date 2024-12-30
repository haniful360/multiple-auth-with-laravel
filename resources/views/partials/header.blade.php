<header class="bg-yellow-600 shadow-lg">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="text-2xl  font-extrabold text-white">MyWebsite</a>
        <!-- Navigation Links -->
        <nav class="hidden md:flex space-x-6">
            <a href="#" class="text-white hover:text-gray-200 transition">Home</a>
            <a href="#" class="text-white hover:text-gray-200 transition">About</a>
            <a href="#" class="text-white hover:text-gray-200 transition">Services</a>
            <a href="#" class="text-white hover:text-gray-200 transition">Contact</a>
        </nav>
        <!-- Authentication Buttons -->
        @if (Auth::check())
            <div class="flex space-x-4">
                <span class="text-white hover:text-gray-200 transition">{{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}"
                    class="bg-white text-red-600 hover:bg-gray-100 transition px-4 py-2 rounded-full">
                    Logout
                </a>
                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form> --}}
            </div>
        @else
            <div class="flex space-x-4">
                <a href="{{ route('login') }}" class="text-white hover:text-gray-200 transition">Login</a>
                <a href="{{ route('register') }}"
                    class="bg-white text-blue-600 hover:bg-gray-100 transition px-4 py-2 rounded-full">Sign Up</a>
            </div>
        @endif

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-white focus:outline-none">
            <!-- Icon for mobile menu (e.g., hamburger icon) -->
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </div>
</header>
