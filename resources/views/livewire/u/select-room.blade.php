<div>
    <x-card title="Select Test Center">
        <form class="grid space-y-3">
            @csrf
            <x-native-select label="Select Test Center"
                wire:model="selected_test_center">
                <option value=""
                    selected> --select-- </option>
                @foreach ($testCenters as $key => $testCenter)
                    <option wire:key="test-center-{{ $key }}"
                        value="{{ $testCenter->id }}">{{ $testCenter->testCenter->name }}</option>
                @endforeach
            </x-native-select>
            <x-native-select label="Select Test Center"
                wire:model="selected_day_time">
                <option value=""
                    selected> --select-- </option>
                <option value="AM">AM</option>
                <option value="PM">PM</option>
            </x-native-select>
            <div class="flex space-x-2">
                <h1>Slots : </h1>
                @if ($this->grouping)
                    <h1>{{ $this->grouping->slots - $this->grouping->occupied_slots }} /
                        {{ $this->grouping->slots }}</h1>
                @else
                    <h1>{{ $selected_day_time }} is not available</h1>
                @endif
            </div>
        </form>
        <x-slot name="footer">
            <div class="flex justify-end">
                <x-button wire:click="save"
                    spinner="save"
                    info>
                    Submit
                </x-button>
            </div>
        </x-slot>
    </x-card>
</div>
