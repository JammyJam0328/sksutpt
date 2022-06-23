<div class="mt-10">
    <div>
        <div>
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                ACCESS Campus
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $this->getCountByCampus('1') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                Isulan Campus
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $this->getCountByCampus('2') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                Tacurong Campus
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $this->getCountByCampus('3') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                Kalamansig Campus
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $this->getCountByCampus('4') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                Bagumbayan Campus
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $this->getCountByCampus('5') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                Palimbang Campus
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $this->getCountByCampus('6') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                Lutayan Campus
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $this->getCountByCampus('7') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col mt-8">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-3 pl-4 pr-3 text-xs font-medium tracking-wide text-left text-gray-500 uppercase sm:pl-6">
                                            Details
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-xs font-medium tracking-wide text-left text-gray-500 uppercase">
                                            Program
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($applications as $application)
                                        <tr>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 divide-y divide-gray-200 sm:pl-6">
                                                @if ($application->user->applicant_type == 'Freshmen')
                                                    <div class="w-32 break-words">
                                                        Remarks :
                                                        @if ($this->getScore($application->permit_number) == '520')
                                                            (WL)
                                                        @endif
                                                        @if ($this->getScore($application->permit_number) >= '526')
                                                            (QNBC)
                                                        @endif
                                                        @if ($this->getScore($application->permit_number) >= '576')
                                                            (QBC)
                                                        @endif
                                                    </div>
                                                    <div class="w-32 break-words">
                                                        Name :
                                                        {{ $application->user->freshmenApplication->last_name }},
                                                        {{ $application->user->freshmenApplication->first_name }}
                                                        {{ $application->user->freshmenApplication->middle_name }}
                                                    </div>
                                                    <div class="w-32 break-words">
                                                        Sex :
                                                        {{ $application->user->freshmenApplication->sex }}
                                                    </div>
                                                    <div class="w-32 break-words">
                                                        Preset Address :
                                                        {{ $application->user->freshmenApplication->present_address }}
                                                    </div>
                                                    <div class="w-32 break-words">
                                                        School Last Attended :
                                                        {{ $application->user->freshmenApplication->school_last_attended }}
                                                    </div>
                                                @else
                                                    <div class="w-32 break-words">
                                                        Remarks :
                                                        @if ($this->getScore($application->permit_number) == '520')
                                                            (WL)
                                                        @endif
                                                        @if ($this->getScore($application->permit_number) >= '526')
                                                            (QNBC)
                                                        @endif
                                                        @if ($this->getScore($application->permit_number) >= '576')
                                                            (QBC)
                                                        @endif
                                                    </div>
                                                    <div class="w-32 break-words">
                                                        Name :
                                                        {{ $application->user->transfereeApplication->last_name }},
                                                        {{ $application->user->transfereeApplication->first_name }}
                                                        {{ $application->user->transfereeApplication->middle_name }}
                                                    </div>
                                                    <div class="w-32 break-words">
                                                        Sex :
                                                        {{ $application->user->transfereeApplication->sex }}
                                                    </div>
                                                    <div class="w-32 break-words">
                                                        Preset Address :
                                                        {{ $application->user->transfereeApplication->present_address }}
                                                    </div>
                                                    <div class="w-32 break-words">
                                                        School Last Attended :
                                                        {{ $application->user->transfereeApplication->last_school_attended }}
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                <div class="w-32 break-words">
                                                    Program :
                                                    @if ($application->user->applicant_type == 'Freshmen')
                                                        {{ $application->user->freshmenApplication->first_choice }},
                                                    @else
                                                        {{ $application->user->transfereeApplication->program_choice }},
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
