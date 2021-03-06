<div x-data>
    <div class="noprint">
        <div class="sticky top-0 flex items-end justify-start w-full px-10 py-3 space-x-3 bg-gray-100 ">
            <x-native-select label="Select Test Center"
                wire:model="testCenter">
                <option value="">Select</option>
                @foreach ($examination->examinationTestCenters as $examinationTestCenter)
                    <option value="{{ $examinationTestCenter->id }}">
                        {{ $examinationTestCenter->testCenter->name }}
                    </option>
                @endforeach
            </x-native-select>
            <x-native-select label="Select Room"
                wire:model="selected_grouping">
                <option value="">Select</option>
                @foreach ($groupings as $grouping)
                    <option value="{{ $grouping->id }}">
                        {{ $grouping->room }} ({{ $grouping->day_time }})
                    </option>
                @endforeach
            </x-native-select>
            <x-button x-on:click="window.print()"
                gray>
                Print
            </x-button>
        </div>
    </div>
    <div class="mt-5">
        <div class="flex justify-between">
            <div class="flex items-center justify-start space-x-3">
                <img src="{{ asset('image/sksu1.png') }}"
                    class="h-20"
                    alt="">
                <div class="-space-y-1 text-gray-700">
                    <h1 class="text-sm font-semibold">
                        Republic of the Philippines
                    </h1>
                    <h1 class="font-semibold text-green-700 ">
                        Sultan Kudarat State University
                    </h1>
                    <h1 class="text-sm font-semibold">
                        Access, EJC Montilla, 9800 City of Tacurong
                    </h1>
                    <h1 class="text-sm font-semibold">
                        Province of Sultan Kudarat
                    </h1>
                </div>
            </div>
            <img src="{{ asset('image/logo2.png') }}"
                class="h-20"
                alt="">
        </div>
        <div class="px-3 mt-5 ">
            <div class="pt-4">
                @if ($selected_grouping != '')
                    <h1 class="text-xl font-semibold text-center text-gray-600">{{ $this->grouping->room }} -
                        {{ $this->grouping->day_time }}</h1>
                @endif
            </div>
            <div class="mt-3">
                <div class="flex flex-col">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden border-2 border-gray-700">
                                <table class="min-w-full divide-y divide-gray-700">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-2 pl-4 pr-3 text-xs font-semibold text-left text-gray-900 sm:pl-6 lg:pl-8">
                                                Examinee ID
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-2 text-xs font-semibold text-left text-gray-900">
                                                Full Name
                                            </th>

                                            <th scope="col"
                                                class="px-3 py-2 text-xs font-semibold text-left text-gray-900">
                                                Seat Number
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-700">
                                        @foreach ($permits as $permit)
                                            <tr>
                                                <td class="px-3 py-2 text-xs text-gray-900 uppercase whitespace-nowrap">
                                                    {{ $permit->permit_number }}
                                                </td>
                                                <td
                                                    class="py-2 pl-4 pr-3 text-xs font-medium text-gray-900 uppercase whitespace-nowrap sm:pl-6 lg:pl-8">
                                                    @if ($permit->user->applicant_type == 'Freshmen')
                                                        {{ $permit->user->freshmenApplication->first_name }}
                                                        {{ $permit->user->freshmenApplication->middle_name }}
                                                        {{ $permit->user->freshmenApplication->last_name }}
                                                    @else
                                                        {{ $permit->user->transfereeApplication->first_name }}
                                                        {{ $permit->user->transfereeApplication->middle_name }}
                                                        {{ $permit->user->transfereeApplication->last_name }}
                                                    @endif
                                                </td>
                                                <td class="px-3 py-2 text-xs text-gray-900 uppercase whitespace-nowrap">
                                                    {{ $permit->chair_number }}
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
</div>
