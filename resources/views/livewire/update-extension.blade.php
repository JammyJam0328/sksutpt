<div>
    <div class="flex justify-between mb-4">
        <x-input label="Search Extension"
            wire:model.debounce.500ms="search" />
        <x-native-select label="Select Status"
            wire:model="filter">
            <option value="Freshmen">Freshmen</option>
            <option value="Transferee">Transferee</option>
        </x-native-select>
    </div>
    <x-card shadow="shadow-none"
        title="Update Extension Name">
        <div>
            <div>
                <div class="flex flex-col mt-2">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-xs font-medium tracking-wide text-left text-gray-500 uppercase sm:pl-6">
                                                Name
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wide text-left text-gray-500 uppercase">
                                                Extension Name
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wide text-left text-gray-500 uppercase">
                                                Address
                                            </th>

                                            <th scope="col"
                                                class="relative py-3 pl-3 pr-4 sm:pr-6">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($applications as $application)
                                            <tr>
                                                <td
                                                    class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                    {{ $application->first_name }} {{ $application->middle_name }}
                                                    {{ $application->last_name }}
                                                </td>
                                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                    {{ $application->extension }}
                                                </td>
                                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                    {{ $application->present_address }}
                                                </td>
                                                <td
                                                    class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                                    <x-button wire:click="clearExtension({{ $application->id }})"
                                                        spinner="clearExtension"
                                                        negative>
                                                        Clear Extension
                                                    </x-button>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="4"
                                                    class="text-center text-gray-500">
                                                    No records found.
                                                </td>
                                            </tr>
                                        @endforelse
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
