<div>
    <div>
        @if (auth()->user()->applicant_type == 'Freshmen')
            <div>
                <x-button wire:click="$set('updatefModal',true)"
                    spinner
                    class="noprint"
                    primary>
                    Update 1st/2nd Priority Programs
                </x-button>
                <x-modal.card title="Update 1st/2nd Priority Programs"
                    wire:model.defer="updatefModal">
                    <div>
                        <div class="mb-2">
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="p-4 border rounded-md bg-yellow-50">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: solid/exclamation -->
                                        <svg class="w-5 h-5 text-yellow-400"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-yellow-800">Attention needed</h3>
                                        <div class="mt-2 text-sm text-yellow-700">
                                            <p>
                                                Please not that we will be disabling this feature on April 19, 2022. Any
                                                request of updating your 1st/2nd priority programs will be ignored.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <form>
                            @csrf
                            <x-native-select class="!border-gray-300 !ring-0"
                                label="Select Campus"
                                wire:model="first_selected_campus">
                                <option value="">--select--</option>
                                @foreach ($campuses as $campus)
                                    <option value="{{ $campus->id }}">
                                        {{ $campus->name }}
                                    </option>
                                @endforeach
                            </x-native-select>
                            <x-native-select label="Select First Choice Program"
                                wire:model.defer="first_selected_program">
                                <option value="">--select--</option>
                                @foreach ($firstChoicePrograms as $program)
                                    <option value="{{ $program->name }}">
                                        {{ $program->name }}
                                    </option>
                                @endforeach
                            </x-native-select>
                            <x-native-select label="Select Second Choice Campus"
                                wire:model="second_selected_campus">
                                <option value="">--select--</option>
                                @foreach ($campuses as $campus)
                                    <option value="{{ $campus->id }}">
                                        {{ $campus->name }}
                                    </option>
                                @endforeach
                            </x-native-select>
                            <x-native-select label="Select Program"
                                wire:model.defer="second_selected_program">
                                <option value="">--select--</option>
                                @foreach ($secondChoicePrograms as $program)
                                    <option value="{{ $program->name }}">
                                        {{ $program->name }}
                                    </option>
                                @endforeach
                            </x-native-select>
                        </form>
                    </div>
                    <x-slot name="footer">
                        <div class="flex justify-end">
                            <x-button wire:click="updateFPrograms"
                                info>
                                Save
                            </x-button>
                        </div>
                    </x-slot>
                </x-modal.card>
            </div>
        @endif
    </div>
</div>
