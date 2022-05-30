<div x-data="{
    printDiv() {
        const printContents = document.getElementById('print_only').innerHTML;
        const originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
}">
    <x-card title="Count : {{ count($applications) }}">
        <x-slot name="action">
            <div class="flex space-x-3">
                <x-native-select wire:model="per_campus">
                    <option value="">All Campuses</option>
                    @foreach (\App\Models\Campus::get() as $campus)
                        <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                    @endforeach
                </x-native-select>
                <x-native-select wire:model="first_choice">
                    <option value="">All Program</option>
                    @foreach (\App\Models\Program::where('campus_id', $per_campus)->get() as $program)
                        <option value="{{ $program->name }}">{{ $program->name }}</option>
                    @endforeach
                </x-native-select>
                <x-button icon="printer"
                    x-on:click="printDiv()" />
            </div>
        </x-slot>
        <div id="print_only">
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
                        <h1 class="text-xs font-semibold">
                            Tertiary Placement Test Result
                        </h1>
                    </div>
                </div>

            </div>
            <div class="mt-4">
                <div>
                    <div class="flex flex-col">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                    Full Name
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Program
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Remarks
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($applications as $application)
                                                <tr>
                                                    <td
                                                        class="py-4 uppercase pl-4 pr-3 text-xs font-medium text-left text-gray-900 whitespace-nowrap ">
                                                        @if ($application->user->applicant_type == 'Freshmen')
                                                            {{ $application->user->freshmenApplication->last_name }},
                                                            {{ $application->user->freshmenApplication->first_name }}
                                                            {{ $application->user->freshmenApplication->middle_name }}
                                                        @else
                                                            {{ $application->user->transfereeApplication->last_name }},
                                                            {{ $application->user->transfereeApplication->first_name }}
                                                            {{ $application->user->transfereeApplication->middle_name }}
                                                        @endif
                                                    </td>
                                                    <td class="py-4 text-xs text-left text-gray-500 whitespace-nowrap">
                                                        @if ($application->user->applicant_type == 'Freshmen')
                                                            {{ $application->user->freshmenApplication->first_choice }}
                                                        @else
                                                            {{ $application->user->transfereeApplication->program_choice }},
                                                        @endif
                                                    </td>
                                                    <td class="py-2 text-xs text-left text-gray-500 whitespace-nowrap">
                                                        @php
                                                            $scores = $this->getScore($application->permit_number);
                                                        @endphp
                                                        <div>
                                                            @if ($scores->overall_score == '520')
                                                                Waiting List |
                                                            @endif
                                                            @if ($scores->overall_score >= '526')
                                                                Qualified for Non-Board Courses |
                                                            @endif
                                                            @if ($scores->overall_score >= '576')
                                                                Qualified for Board Courses
                                                            @endif
                                                        </div>
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
        </div>
    </x-card>
</div>
