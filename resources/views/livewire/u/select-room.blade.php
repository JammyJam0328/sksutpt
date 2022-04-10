<div>
    <x-card title="Select Test Center">
        <div class="mb-2">
            <div class="rounded-md bg-blue-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3 flex-1 md:flex md:justify-between">
                        <p class="text-sm text-blue-700">Your payment has been approved please select the following:</p>
                    </div>
                </div>
            </div>
        </div>
        <form class="grid space-y-3">
            @csrf
            <x-native-select label="Select Day Time"
                wire:model="selected_day_time">
                <option value=""
                    selected> --select-- </option>
                @foreach ($times as $time)
                    <option value="{{ $time }}">{{ $time }}</option>
                @endforeach
            </x-native-select>
            <div class="flex space-x-2 text-red-600 font-semibold">
                @if ($this->grouping)
                    <h1>Slots : {{ $this->grouping->room }}</h1>
                    <h1>{{ $this->grouping->slots - $this->grouping->occupied_slots }} /
                        {{ $this->grouping->slots }}</h1>
                @endif
            </div>
        </form>
        <x-slot name="footer">
            <div class="flex justify-end">
                @if ($this->grouping)
                    <x-button wire:click="save"
                        spinner="save"
                        info>
                        Submit
                    </x-button>
                @endif
            </div>
        </x-slot>
    </x-card>
</div>
