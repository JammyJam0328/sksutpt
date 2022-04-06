<!DOCTYPE html>
<html class="h-full bg-white"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
        content="{{ csrf_token() }}">
    <link rel="icon"
        href="{{ asset('image/sksu1.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect"
        href="https://fonts.googleapis.com">
    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet"
        href="{{ mix('css/app.css') }}">

    @livewireStyles
    @wireUiScripts
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"
        defer></script>
    <style>
        @media print {
            .noprint {
                display: none;
            }

            body {
                margin: 0;
            }
        }

    </style>
</head>

<body x-data="{ mnIsOpen: false }"
    class="relative h-full bg-white font-poppins">

    <div class="min-h-full">
        <nav class="sticky top-0 z-50 bg-green-600 shadow noprint">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10"
                                src="{{ asset('image/sksu1.png') }}"
                                alt="Workflow">
                        </div>
                        <div class="hidden md:block">
                            <div class="pl-4">
                                <h1 class="text-2xl font-semibold text-white">SULTAN KUDARAT STATE UNIVERITY</h1>
                            </div>
                        </div>
                        <div class="block md:hidden">
                            <div class="pl-4">
                                <h1 class="text-2xl font-semibold text-white">SKSU</h1>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-center ml-4 md:ml-6">
                            <div x-data="{ isOpen: false }"
                                class="relative ml-3">
                                <div>
                                    <button x-on:click="isOpen=!isOpen"
                                        type="button"
                                        class="flex items-center max-w-xs text-sm bg-green-500 border rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-600 focus:ring-white"
                                        id="user-menu-button"
                                        aria-expanded="false"
                                        aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-8 h-8 text-white"
                                            viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="pl-1 pr-2 text-white">{{ auth()->user()->name }}</span>
                                    </button>
                                </div>

                                <div x-cloak
                                    x-show="isOpen"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95"
                                    class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu"
                                    aria-orientation="vertical"
                                    aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <form method="POST"
                                        action="{{ route('logout') }}"
                                        x-data>
                                        @csrf
                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                            {{ __('Sign out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mr-2 md:hidden">
                        <button x-on:click="mnIsOpen=!mnIsOpen"
                            type="button"
                            class="inline-flex items-center justify-center p-2 text-green-200 bg-green-600 rounded-md hover:text-white hover:bg-green-500 hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-600 focus:ring-white"
                            aria-controls="mobile-menu"
                            aria-expanded="false">
                            <span class="sr-only">Open main menu</span>

                            <svg x-show="mnIsOpen==false"
                                class="w-6 h-6"
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

                            <svg x-cloak
                                x-show="mnIsOpen"
                                class="w-6 h-6 "
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
            </div>

            <div x-cloak
                x-show="mnIsOpen"
                class="md:hidden"
                x-collapse
                id="mobile-menu">
                <div class="pt-4 pb-3 border-t border-white">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-10 h-10 text-white"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-white">{{ auth()->user()->name }}</div>
                        </div>
                    </div>
                    <div class="px-2 mt-3 space-y-1">
                        <form method="POST"
                            action="{{ route('logout') }}"
                            x-data>
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
                                {{ __('Sign out') }}
                            </x-jet-dropdown-link>
                        </form>

                    </div>
                </div>
            </div>
        </nav>

        <main>
            <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8 pb-14">
                <div class="px-4 py-4 sm:px-0">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>


    <x-notifications z-index="z-50" />
    <x-dialog z-index="z-50"
        blur="md"
        align="center" />
    @livewireScripts
</body>

</html>
