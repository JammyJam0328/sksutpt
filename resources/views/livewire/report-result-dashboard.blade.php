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
                <div class="flex justify-center items-center pr-3">
                    <div wire:loading>
                        <span class="animate-bounce">Loading ...</span>
                    </div>
                </div>
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
                <div class="flex justify-center">
                    <div class="flex flex-col">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    Full Name
                                                </th>
                                                <th scope="col">
                                                    Program
                                                </th>
                                                <th scope="col">
                                                    Remarks
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($applications as $application)
                                                <tr>
                                                    <td>
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
                                                    <td>
                                                        @if ($application->user->applicant_type == 'Freshmen')
                                                            {{ $application->user->freshmenApplication->first_choice }}
                                                        @else
                                                            {{ $application->user->transfereeApplication->program_choice }},
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($this->getScore($application->permit_number) == '520')
                                                            Waiting List |
                                                        @endif
                                                        @if ($this->getScore($application->permit_number) >= '526')
                                                            Qualified for Non-Board Courses |
                                                        @endif
                                                        @if ($this->getScore($application->permit_number) >= '576')
                                                            Qualified for Board Courses
                                                        @endif
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
