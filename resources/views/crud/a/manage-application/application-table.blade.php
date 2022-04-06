<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Application</h1>
            <p class="mt-2 text-sm text-gray-700">
                List of all applications. By default, all application of the latest examination.
            </p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <x-native-select wire:model="tab">
                <option value="freshmen">Freshmen</option>
                <option value="transferee">Transferee</option>
            </x-native-select>
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
                                    Full Name
                                </th>
                                @if ($tab == 'freshmen')
                                    <th scope="col"
                                        class="px-3 py-3 text-xs font-medium tracking-wide text-left text-white uppercase">
                                        First Choice
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3 text-xs font-medium tracking-wide text-left text-white uppercase">
                                        Second Choice
                                    </th>
                                @else
                                    <th scope="col"
                                        class="px-3 py-3 text-xs font-medium tracking-wide text-left text-white uppercase">
                                        Program Choice
                                    </th>
                                @endif
                                <th scope="col"
                                    class="relative py-3 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($applications as $application)
                                <tr>
                                    <td
                                        class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                        {{ $application->first_name }}
                                        {{ $application->middle_name }}
                                        {{ $application->last_name }}
                                    </td>
                                    @if ($tab == 'freshmen')
                                        <td class="px-3 py-4 text-xs text-gray-500 ">
                                            <div class="flex w-40 break-words">{{ $application->first_choice }}</div>
                                        </td>
                                        <td class="px-3 py-4 text-xs text-gray-500 ">
                                            <div class="flex w-40 break-words"> {{ $application->second_choice }}
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-3 py-4 text-sm text-gray-500 ">
                                            <div class="flex w-40 break-words">
                                                {{ $application->program_choice }}
                                            </div>
                                        </td>
                                    @endif
                                    <td
                                        class="relative py-4 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                        <x-button wire:click="showOption({{ $application->id }})"
                                            gray>
                                            Option
                                        </x-button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"
                                        class="p-4 text-center text-gray-500">
                                        No application found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="my-2">
                    {{ $applications->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
