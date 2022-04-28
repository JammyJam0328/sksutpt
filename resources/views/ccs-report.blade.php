<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

    <!-- Styles -->
    <link rel="stylesheet"
        href="{{ mix('css/app.css') }}">

    @livewireStyles
    @wireUiScripts

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"
        defer></script>
</head>

<body class="font-poppins">
    @php
        
        $freshmens = \App\Models\User::whereHas('freshmenApplication', function ($query) {
            $query->whereIn('first_choice', ['Bachelor of Science in Computer Science (Level II)', 'Bachelor of Science in Information Technology (Level III)', 'Bachelor of Science in Information System (Level II)'])->orWhereIn('second_choice', ['Bachelor of Science in Computer Science (Level II)', 'Bachelor of Science in Information Technology (Level III)', 'Bachelor of Science in Information System (Level II)']);
        })
            ->whereHas('permit')
            ->get();
    @endphp

    @php
        $transferees = \App\Models\User::whereHas('transfereeApplication', function ($query) {
            $query->whereIn('program_choice', ['Bachelor of Science in Computer Science (Level II)', 'Bachelor of Science in Information Technology (Level III)', 'Bachelor of Science in Information System (Level II)']);
        })
            ->whereHas('permit')
            ->get();
    @endphp
    <div>
        <div class="px-4 mx-auto sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Applications</h1>
                    <div class="flex mt-2 space-x-3 text-sm text-gray-700">
                        <div class="font-semibold">{{ $freshmens->count() }} Freshmen</div>
                        <div class="font-semibold">{{ $transferees->count() }} Transferees</div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col ">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Program
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($freshmens as $freshmen)
                                        <tr>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6 lg:pl-8">
                                                {{ $freshmen->freshmenApplication->first_name }}
                                                {{ $freshmen->freshmenApplication->middle_name }}
                                                {{ $freshmen->freshmenApplication->last_name }}
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                <ul class="list-disc">
                                                    <li>{{ $freshmen->freshmenApplication->first_choice }}</li>
                                                    <li>{{ $freshmen->freshmenApplication->second_choice }}</li>
                                                </ul>
                                            </td>

                                        </tr>
                                    @endforeach

                                    @foreach ($transferees as $transferee)
                                        <tr>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6 lg:pl-8">
                                                {{ $transferee->transfereeApplication->first_name }}
                                                {{ $transferee->transfereeApplication->middle_name }}
                                                {{ $transferee->transfereeApplication->last_name }}
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                <ul class="list-disc">
                                                    <li>{{ $transferee->transfereeApplication->program_choice }}</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>
