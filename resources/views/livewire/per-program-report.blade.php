<div class="mt-10">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="mb-3">
            <x-native-select label="Select Program"
                wire:model="selected_program">
                <option value=""></option>
                @foreach ($programs as $program)
                    <option value="{{ $program->name }}">{{ $program->name }}</option>
                @endforeach
            </x-native-select>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Name</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Score</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @forelse ($permits as $permit)
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 uppercase pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            @if ($permit->user->freshmenApplication)
                                                {{ $permit->user->freshmenApplication->first_name }}
                                                {{ $permit->user->freshmenApplication->middle_name }}
                                                {{ $permit->user->freshmenApplication->last_name }}
                                            @else
                                                {{ $permit->user->transfereeApplication->first_name }}
                                                {{ $permit->user->transfereeApplication->middle_name }}
                                                {{ $permit->user->transfereeApplication->last_name }}
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $this->getScore($permit->permit_number) }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2"
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            No data found.
                                        </td>
                                    </tr>
                                @endforelse


                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
