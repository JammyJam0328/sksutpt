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
        $ccs_course = ['Bachelor of Science in Computer Science (Level II)', 'Bachelor of Science in Information Technology (Level III)', 'Bachelor of Science in Information System (Level II)'];
    @endphp
    <div class="flex items-center justify-center p-10 mx-auto">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div>
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Users</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name,
                        title, email and role.</p>
                </div>
            </div>
            <div class="flex flex-col mt-8">
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
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Category
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @php
                                        
                                        $students = \App\Models\User::whereHas('freshmenApplication', function ($query) {
                                            $query->whereIn('first_choice', $ccs_course)->orWhereIn('second_choice', $ccs_course);
                                        })
                                            ->whereHas('permit')
                                            ->get();
                                    @endphp
                                    @foreach ($students as $student)
                                        <tr>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6 lg:pl-8">
                                                {{ $student->freshmenApplication->first_name }}
                                                {{ $student->freshmenApplication->middle_name }}
                                                {{ $student->freshmenApplication->last_name }}
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                <ul class="list-disc">
                                                    <li>{{ $student->freshmenApplication->first_choice }}</li>
                                                    <li>{{ $student->freshmenApplication->second_choice }}</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @php
                                        
                                        $students = \App\Models\User::whereHas('transfereeApplication', function ($query) {
                                            $query->whereIn('program_choice', $ccs_course);
                                        })
                                            ->whereHas('permit')
                                            ->get();
                                    @endphp
                                    @foreach ($students as $student)
                                        <tr>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6 lg:pl-8">
                                                {{ $student->transfereeApplication->first_name }}
                                                {{ $student->transfereeApplication->middle_name }}
                                                {{ $student->transfereeApplication->last_name }}
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                <ul class="list-disc">
                                                    <li>{{ $student->transfereeApplication->program_choice }}</li>
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
