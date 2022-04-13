<div>
    <x-card shadow="shadow-none"
        title="Update Photo Image">
        <form>
            @csrf
            <x-native-select label="Select Status"
                wire:model="filter">
                <option value="">Select</option>
                <option value="Freshmen">Freshmen</option>
                <option value="Transferee">Transferee</option>
                <option>Done</option>
            </x-native-select>
            <div>
                <label for="combobox"
                    class="block text-sm font-medium text-gray-700">Search Student</label>
                <div class="relative mt-1">
                    <input id="searchTerm"
                        type="text"
                        wire:model.debounce.500ms="searchTerm"
                        class="w-full py-2 pl-3 pr-12 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
                        role="searchTerm"
                        aria-controls="options"
                        aria-expanded="false">
                    <div>
                        @if ($searchTerm != '')
                            <ul class="absolute z-10 w-full py-1 mt-1 overflow-auto text-base bg-white rounded-md shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                id="options"
                                role="listbox">
                                @forelse ($applications as $key=>$application)
                                    <li wire:key="{{ $key }}-{{ $application->id }}"
                                        wire:click="selectStudent({{ $application->id }})"
                                        class="relative py-2 pl-3 text-gray-900 cursor-default select-none pr-9"
                                        id="option-0"
                                        role="option"
                                        tabindex="-1">
                                        <span class="block truncate">
                                            {{ $application->last_name }},
                                            {{ $application->first_name }}
                                            {{ $application->middle_name }}
                                        </span>
                                    </li>
                                @empty
                                    <li class="text-sm text-gray-600">No results found</li>
                                @endforelse

                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <x-input type="file"
                    wire:model="new_image"
                    label="New Photo">
                </x-input>
                <span wire:loading
                    wire:target="new_image">Uploading ... </span>
            </div>
            <div class="mt-5">
                @if ($selected_id)
                    <img src="{{ Storage::url($this->application->photo) }}"
                        alt="">
                @endif
            </div>
        </form>
        <x-slot name="footer">
            <div class="flex justify-end">
                <x-button color="blue"
                    wire:click="updateImage">
                    Update Image
                </x-button>
            </div>

        </x-slot>
    </x-card>
</div>
