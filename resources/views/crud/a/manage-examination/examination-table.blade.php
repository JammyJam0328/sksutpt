<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Examination</h1>
            <p class="mt-2 text-sm text-gray-700">
                List of all examinations
            </p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <x-button wire:click="$set('createExaminationModal',true)"
                info>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 "
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 4v16m8-8H4" />
                </svg>
                <span>Add new</span>
            </x-button>
        </div>
    </div>
    <div class="flex flex-col mt-8">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-green-600">
                            <tr>
                                <th scope="col"
                                    class="py-3 pl-4 pr-3 text-xs font-medium tracking-wide text-left text-white uppercase sm:pl-6">
                                    Title</th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wide text-left text-white uppercase">
                                    School Year</th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wide text-left text-white uppercase">
                                    Date</th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wide text-left text-white uppercase">
                                    Status</th>
                                <th scope="col"
                                    class="relative py-3 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($examinations as $examination)
                                <tr>
                                    <td
                                        class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                        {{ $examination->title }}
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $examination->school_year }}
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        @php
                                            $date = new DateTime($examination->date);
                                        @endphp
                                        {{ $date->format('F d, Y') }}
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        @if ($examination->isOpen)
                                            <span class="text-green-500">Open</span>
                                        @else
                                            <span class="text-red-500">Close</span>
                                        @endif
                                    </td>
                                    <td
                                        class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                        <div class="flex justify-end space-x-2">
                                            @if ($examination->isOpen)
                                                <x-button wire:click="close({{ $examination->id }})"
                                                    negative>
                                                    Close
                                                </x-button>
                                            @else
                                                <x-button wire:click="open({{ $examination->id }})"
                                                    positive>
                                                    Open
                                                </x-button>
                                            @endif
                                            <x-button wire:click="showOption({{ $examination->id }})"
                                                gray>
                                                Options
                                            </x-button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="p-4 text-center text-gray-500">
                                        No examination found
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
