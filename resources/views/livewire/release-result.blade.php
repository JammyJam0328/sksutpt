<div x-data="{ prevent: false }"
    x-on:start-printing="setTimeout(function(){
        window.print()
    },1000)"
    @keydown.ctrl.window="prevent=true">
    @if ($result)
        <div x-show="prevent==false"
            class="mb-10">
            <div class="flex justify-between">
                <div class="flex items-center justify-start space-x-3">
                    <img src="{{ asset('image/sksu1.png') }}"
                        class="h-20"
                        alt="">
                    <div class="-space-y-1 text-gray-700">
                        <h1 class="text-xs font-semibold">
                            Republic of the Philippines
                        </h1>
                        <h1 class="font-semibold text-green-700 ">
                            Sultan Kudarat State University
                        </h1>
                        <h1 class="text-xs font-semibold">
                            Access, EJC Montilla, 9800 City of Tacurong
                        </h1>
                        <h1 class="text-xs font-semibold">
                            Province of Sultan Kudarat
                        </h1>
                    </div>
                </div>
                <div id="print-verified"
                    wire:key="print-verified">
                    @if ($print_verified)
                        <svg id="icon"
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-10 h-10 text-green-600"
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    @endif
                </div>
            </div>
        </div>
        <div x-show="prevent==false"
            class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end mb-2 noprint">

                <x-button icon="printer"
                    label="print"
                    wire:click="print"
                    spinner="print"
                    gray>
                </x-button>
            </div>
            <div x-show="prevent==false"
                class="flex flex-col mt-7">
                <div class="space-y-2">
                    <div>
                        {{-- <img src="{{ Storage::url($this->application->photo) }}"
                            class="w-full h-auto border max-h-48"
                            alt="..."> --}}
                    </div>
                    <div class="flex items-end w-full pb-4 space-x-2">
                        <h1>Name : {{ $this->application->first_name }} {{ $this->application->middle_name }}
                            {{ $this->application->last_name }}
                        </h1>
                    </div>
                    <div class="flex items-end w-full pb-4 space-x-2">
                        @if (auth()->user()->applicant_type == 'freshmen')
                            <div class="grid space-y-1">
                                <h1>First Choice : {{ $this->application->firs_choice }}
                                </h1>
                                <h1>Second Choice : {{ $this->application->firs_choice }}
                                </h1>
                            </div>
                        @else
                            <div>
                                <h1>Program Choice : {{ $this->application->firs_choice }}
                                </h1>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-1 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-1 pl-4 pr-3 text-xs font-semibold text-left text-gray-900 sm:pl-6">
                                            Course
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-1 text-xs font-semibold text-left text-gray-900">
                                            Standard Score
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-1 text-xs font-semibold text-left text-gray-900">
                                            Qualitative Interpretation
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td
                                            class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                            Mathematics
                                        </td>
                                        <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                            {{ $result->mathematics }}
                                        </td>
                                        <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                            {{ $this->getInterpretation($result->mathematics) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                            English
                                        </td>
                                        <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                            {{ $result->english }}
                                        </td>
                                        <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                            {{ $this->getInterpretation($result->english) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                            Filipino
                                        </td>
                                        <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                            {{ $result->filipino }}
                                        </td>
                                        <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                            {{ $this->getInterpretation($result->filipino) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                            Science
                                        </td>
                                        <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                            {{ $result->science }}
                                        </td>
                                        <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                            {{ $this->getInterpretation($result->science) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                            Social Studies
                                        </td>
                                        <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                            {{ $result->social_studies }}
                                        </td>
                                        <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                            {{ $this->getInterpretation($result->social_studies) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="py-1 pl-4 pr-3 text-xs font-bold text-gray-900 whitespace-nowrap sm:pl-6">
                                            Overall
                                        </td>
                                        <td class="px-3 py-1 text-xs font-bold text-gray-500 whitespace-nowrap">
                                            {{ $result->overall_score }}
                                        </td>
                                        <td class="px-3 py-1 text-xs font-bold text-gray-500 whitespace-nowrap">
                                            {{ $this->getInterpretation($result->overall_score) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="prevent==false"
                class="mt-5">
                <span class="text-sm text-gray-600 ">Remarks</span>
                <div class="space-x-3 space-y-3">
                    @if ($result->overall_score < '520')
                        <span
                            class="inline-flex text-xs items-center px-3.5 py-1 rounded-full  font-medium bg-red-100 text-red-800">
                            Failed
                        </span>
                    @endif
                    @if ($result->overall_score == '520')
                        <span
                            class="inline-flex text-xs items-center px-3.5 py-1 rounded-full  font-medium bg-gray-100 text-gray-800">
                            Waiting List
                        </span>
                    @endif
                    @if ($result->overall_score >= '526')
                        <span
                            class="inline-flex text-xs items-center px-3.5 py-1 rounded-full  font-medium bg-yellow-100 text-yellow-800">
                            Qualified for Non-Board Courses
                        </span>
                    @endif
                    @if ($result->overall_score >= '576')
                        <span
                            class="inline-flex items-center px-3.5 py-1 rounded-full  font-medium bg-green-100 text-green-800">
                            Qualified for Board Courses
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div x-show="prevent==false"
            class="mt-5 space-y-4">
            <hr>
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col mt-8">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-1 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-1 pl-4 pr-3 text-xs font-semibold text-left text-gray-900 sm:pl-6">
                                                Standard Score</th>
                                            <th scope="col"
                                                class="px-3 py-1 text-xs font-semibold text-left text-gray-900">
                                                Qualitative Interpretation </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td
                                                class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                200 to 325</td>
                                            <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                                Low </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                326 to 425</td>
                                            <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                                Below Average </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                426 to 475</td>
                                            <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                                Low Average </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                476 to 525</td>
                                            <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                                Middle Average </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                526 to 575</td>
                                            <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                                High Average </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                576 to 675</td>
                                            <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                                Above Average </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                676 to 800</td>
                                            <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                                Outstanding </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col mt-3">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-1 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-1 pl-4 pr-3 text-xs font-semibold text-left text-gray-900 sm:pl-6">
                                                Performance</th>
                                            <th scope="col"
                                                class="px-3 py-1 text-xs font-semibold text-left text-gray-900">
                                                Remarks
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td
                                                class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                Middle Average with Standard Score of 520 Only</td>
                                            <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                                Waiting List </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                High Average, Above Average and Outstanding</td>
                                            <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                                Qualified for Non-Board Courses </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="py-1 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                Above Average and Outstanding</td>
                                            <td class="px-3 py-1 text-xs text-gray-500 whitespace-nowrap">
                                                Qualified for Board Courses </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="flex items-end justify-center"
            x-show="prevent==true">
            <x-button label="return"
                x-on:click="prevent=false"></x-button>
        </div>
    @else
        <div class="p-4 rounded-md bg-red-50">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-red-400"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">
                        Please be informed that the scoring machine of SKSU TPT cannot recognize your answer sheet
                        due
                        to either of the following reasons:
                    </h3>
                    <div class="mt-2 text-sm text-red-700">
                        <ul role="list"
                            class="pl-5 space-y-1 list-disc">
                            <li>
                                Duplication of examinee ID number
                            </li>
                            <li>
                                Incorrect marking
                            </li>
                            <li>
                                Light shaded marking
                            </li>
                            <li>
                                Two or more answers shaded answers in one item
                            </li>
                            <li>
                                Spoiled answer sheet
                            </li>
                            <li>
                                Crumpled answer sheet
                            </li>
                        </ul>
                    </div>
                    <h3 class="mt-2 text-sm font-medium text-red-800">
                        Therefore, your examination is considered invalid.
                    </h3>
                </div>
            </div>
        </div>

    @endif
</div>
