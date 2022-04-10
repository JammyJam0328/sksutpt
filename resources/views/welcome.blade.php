<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">

    <title>SKSU TPT</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"
        defer></script>
</head>

<body x-data="{ mobileNav: false }"
    class=" antialiased font-poppins">
    <div class="relative h-full overflow-hidden bg-gray-50">
        <div class="hidden sm:block sm:absolute sm:inset-y-0 sm:h-full sm:w-full"
            aria-hidden="true">
            <div class="relative h-full mx-auto max-w-7xl">
                <svg class="absolute transform right-full translate-y-1/4 translate-x-1/4 lg:translate-x-1/2"
                    width="404"
                    height="784"
                    fill="none"
                    viewBox="0 0 404 784">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49"
                            x="0"
                            y="0"
                            width="20"
                            height="20"
                            patternUnits="userSpaceOnUse">
                            <rect x="0"
                                y="0"
                                width="4"
                                height="4"
                                class="text-gray-200"
                                fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404"
                        height="784"
                        fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                </svg>
                <svg class="absolute transform left-full -translate-y-3/4 -translate-x-1/4 md:-translate-y-1/2 lg:-translate-x-1/2"
                    width="404"
                    height="784"
                    fill="none"
                    viewBox="0 0 404 784">
                    <defs>
                        <pattern id="5d0dd344-b041-4d26-bec4-8d33ea57ec9b"
                            x="0"
                            y="0"
                            width="20"
                            height="20"
                            patternUnits="userSpaceOnUse">
                            <rect x="0"
                                y="0"
                                width="4"
                                height="4"
                                class="text-gray-200"
                                fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404"
                        height="784"
                        fill="url(#5d0dd344-b041-4d26-bec4-8d33ea57ec9b)" />
                </svg>
            </div>
        </div>

        <div class="relative pt-6 pb-16 sm:pb-24">
            <div>
                <div class="px-4 mx-auto max-w-7xl sm:px-6">
                    <nav class="relative flex items-center justify-between sm:h-10 md:justify-center"
                        aria-label="Global">
                        <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                            <div class="flex items-center justify-between w-full md:w-auto">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ asset('image/sksu1.png') }}"
                                        class="w-16 h-16"
                                        alt="...">
                                    <h1 class="text-3xl font-bold text-green-600">SKSU TPT</h1>
                                </div>
                                <div class="flex items-center -mr-2 md:hidden">
                                    <button x-on:click="mobileNav=true"
                                        type="button"
                                        class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md bg-gray-50 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500"
                                        aria-expanded="false">
                                        <span class="sr-only">Open main menu</span>
                                        <svg class="w-6 h-6"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:flex md:space-x-10">
                            <a href="https://sksu.edu.ph/"
                                class="font-medium text-gray-500 hover:text-gray-900">Visit Website</a>

                            <a href="#"
                                class="font-medium text-gray-500 hover:text-gray-900">About</a>

                            <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=sksutpt2022@gmail.com"
                                target="_blank"
                                class="font-medium text-gray-500 hover:text-gray-900">Email Us</a>
                        </div>
                        <div
                            class="hidden space-x-2 md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
                            @guest
                                <span class="inline-flex rounded-md shadow">
                                    <a href="{{ route('login') }}"
                                        class="inline-flex items-center px-4 py-2 text-base font-medium text-green-600 bg-white border border-transparent rounded-md hover:bg-gray-50">
                                        Log in </a>
                                </span>
                                <span class="inline-flex rounded-md shadow">
                                    <a href="{{ route('register') }}"
                                        class="inline-flex items-center px-4 py-2 text-base font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700">
                                        Register </a>
                                </span>
                            @endguest
                            @auth
                                <span class="inline-flex rounded-md shadow">
                                    <a href="{{ route('dashboard') }}"
                                        class="inline-flex items-center px-4 py-2 text-base font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700">
                                        Dashboard
                                    </a>
                                </span>
                            @endauth
                        </div>
                    </nav>
                </div>
                <div x-cloak
                    x-show="mobileNav"
                    x-transition:enter="duration-150 ease-out"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="duration-100 ease-in"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute inset-x-0 top-0 z-10 p-2 transition origin-top-right transform md:hidden">
                    <div class="overflow-hidden bg-white rounded-lg shadow-md ring-1 ring-black ring-opacity-5">
                        <div class="flex items-center justify-between px-5 pt-4">
                            <div class="flex items-center space-x-3">
                                <img src="{{ asset('image/sksu1.png') }}"
                                    class="w-12 h-12"
                                    alt="...">
                                <h1 class="text-3xl font-bold text-green-600">SKSU TPT</h1>
                            </div>
                            <div class="-mr-2">
                                <button x-on:click="mobileNav=false"
                                    type="button"
                                    class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500">
                                    <span class="sr-only">Close menu</span>
                                    <svg class="w-6 h-6"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="px-2 pt-2 pb-3">
                            <a href="https://sksu.edu.ph/"
                                class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">Visit
                                Website</a>

                            <a href="#"
                                class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">About</a>

                            <a href="#"
                                class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">Email
                                Us</a>
                        </div>
                        @guest
                            <a href="{{ route('login') }}"
                                class="block w-full px-5 py-3 font-medium text-center text-green-600 bg-gray-50 hover:bg-gray-100">
                                Log in </a>
                            <a href="{{ route('register') }}"
                                class="block w-full px-5 py-3 font-medium text-center bg-green-600 text-gray-50 hover:bg-green-700">
                                Register </a>
                        @endguest
                        @auth
                            <a href="{{ route('dashboard') }}"
                                class="block w-full px-5 py-3 font-medium text-center bg-green-600 text-gray-50 hover:bg-green-700">
                                Dashboard </a>
                        @endauth
                    </div>
                </div>
            </div>

            <main class="px-4 mx-auto mt-16 max-w-7xl sm:mt-24">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-green-600 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">SULTAN KUDARAT</span>
                        <span class="block xl:inline">STATE UNIVERSITY</span>
                    </h1>
                    <p class="max-w-md mx-auto mt-3 text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                        Province of Sultan Kudarat, 9800, City of Tacurong, Philippines
                    </p>

                    <div class="mt-5 flex justify-center text-left">
                        <div class="rounded-md bg-yellow-50 p-4 border border-yellow-500 text-start">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: solid/exclamation -->
                                    <svg class="h-5 w-5 text-yellow-400"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-yellow-800">Attention needed</h3>
                                    <div class="mt-2 text-sm text-yellow-700">
                                        <p>
                                            Pre-registration period is on 𝐀𝐩𝐫𝐢𝐥 𝟏𝟏-𝟐𝟎, 𝟐𝟎𝟐𝟐
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center mt-5">
                        <iframe
                            src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FSKSUfbofficial%2Fposts%2F522104776200795&show_text=true&width=500"
                            width="500"
                            height="813"
                            style="border:none;overflow:hidden"
                            scrolling="no"
                            frameborder="0"
                            allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>

</html>
