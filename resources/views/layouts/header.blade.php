<!-- resources/views/layouts/header.blade.php -->

<header class="bg-black shadow-md fixed w-full z-50">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Left side -->
            <div class="flex items-center space-x-3">

                <!-- Mobile Toggle Button -->
                <button @click="sidebarOpen = !sidebarOpen"
                        class="md:hidden text-white focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>

                <h1 class="text-white font-bold text-xl">
                    Academy Admin
                </h1>
            </div>

            <!-- Right side -->
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="bg-white text-black px-4 py-2 rounded-md hover:bg-gray-200 transition">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</header>
