<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aprende SQL</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @vite('resources/css/app.css')

</head>

<body>

    <header class="bg-white dark:bg-slate-800">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">

            <!-- Logo -->
            <div class="flex lg:flex-1">
                <a href="#" class="select-none -m-1.5 p-1.5">
                    <span class="sr-only">UCA</span>
                    <img class="h-8 w-auto" src="https://cdn-icons-png.flaticon.com/512/4248/4248416.png" alt="">
                </a>
            </div>

            <!-- Hidden Menu (Mobile) -->
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <div class="hidden lg:flex lg:gap-x-12">
                <a href="#" class="select-none text-lg font-semibold leading-6 text-gray-700 hover:text-gray-900">Home</a>
                <a href="#" class="select-none text-lg font-semibold leading-6 text-gray-700 hover:text-gray-900">PlayGround</a>
                <a href="#" class="select-none text-lg font-semibold leading-6 text-gray-700 hover:text-gray-900">Challenges</a>
            </div>

            <!-- Dropdown User Menu -->
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <div class="flex justify-center">
                    <!-- Dropdown -->
                    <div class="relative">
                        <button onclick="toggleDropdownUser()" class="select-none block h-10 w-10 rounded-full overflow-hidden focus:outline-none">
                            <img class="h-full w-full object-cover" src="https://cdn.icon-icons.com/icons2/2643/PNG/512/male_boy_person_people_avatar_icon_159358.png" alt="avatar">
                        </button>
                        <!-- Dropdown Body -->
                        <div id="dropdownUser" class="hidden absolute right-0 z-20 w-56 pt-2 mt-2 overflow-hidden bg-white rounded-md shadow-xl dark:bg-gray-800">
                            <a href="#" class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                <img class="select-none flex-shrink-0 object-cover mx-1 rounded-full w-9 h-9" src="https://cdn.icon-icons.com/icons2/2643/PNG/512/male_boy_person_people_avatar_icon_159358.png" alt="jane avatar">
                                <div class="mx-1">
                                    <h1 class="select-none text-sm font-semibold text-gray-700 dark:text-gray-200">Alvaro Orellana</h1>
                                    <p class="select-none text-sm text-gray-500 dark:text-gray-400">al.orellanaserrano</p>
                                </div>
                            </a>

                            <hr class="border-gray-200 dark:border-gray-700 ">

                            <a href="#" class="select-none block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                Profile
                            </a>

                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="select-none block px-4 py-3 text-sm text-red-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden"> @csrf </form>
                        </div>
                    </div>
                </div>
            </div>

        </nav>
    </header>

    @yield('content')

    <footer class="bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="#" class="hover:underline">SQL UCA</a>. All Rights Reserved.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                <li class="flex items-center">
                    <a href="#" class="mt hover:underline me-4 md:me-6"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path class="fill-slate-500 hover:fill-slate-700" d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                        </svg>
                    </a>
                </li>
                <li class="flex items-center">
                    <a href="#" class="mt hover:underline me-4 md:me-6"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path class="fill-slate-500 hover:fill-slate-700" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </footer>

    @yield('scripts')
    <script>
    function toggleDropdownUser() {
        let dropDownMenu = document.getElementById('dropdownUser');
        if (dropDownMenu.classList.contains('hidden')) {
            dropDownMenu.classList.remove('hidden');
            setTimeout(() => {
                dropDownMenu.classList.add('hidden');
            }, 2000);
        } else {
            dropDownMenu.classList.add('hidden');
        }
    }
</script>

</body>

</html>