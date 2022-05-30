<div>
    <x-card>
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
                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                    @endforeach
                </x-native-select>
                <x-button icon="printer" />
            </div>
        </x-slot>
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
        <div class="mt-10">
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
                                                    class="py-4 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
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
                                                <td class="px-3 py-4 text-xs text-gray-500 whitespace-nowrap">
                                                    @if ($application->user->applicant_type == 'Freshmen')
                                                        {{ $application->user->freshmenApplication->first_choice }}
                                                    @else
                                                        {{ $application->user->transfereeApplication->program_choice }},
                                                    @endif
                                                </td>
                                                <td class="px-3 py-4 text-xs text-gray-500 whitespace-nowrap">
                                                    @if ($application->overall_score == '520')
                                                        <span
                                                            class="inline-flex text-xs items-center px-3.5 py-1 rounded-full  font-medium bg-gray-100 text-gray-800">
                                                            Waiting List
                                                        </span>
                                                    @endif
                                                    @if ($application->overall_score >= '526')
                                                        <span
                                                            class="inline-flex text-xs items-center px-3.5 py-1 rounded-full  font-medium bg-yellow-100 text-yellow-800">
                                                            Qualified for Non-Board Courses
                                                        </span>
                                                    @endif
                                                    @if ($application->overall_score >= '576')
                                                        <span
                                                            class="inline-flex items-center px-3.5 py-1 rounded-full  font-medium bg-green-100 text-green-800">
                                                            Qualified for Board Courses
                                                        </span>
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
    </x-card>
</div>
