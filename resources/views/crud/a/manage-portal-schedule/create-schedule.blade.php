<x-modal.card wire:model.defer="createScheduleModal"
    title="Create Schedule"
    max-width="3xl">
    <form>
        @csrf
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="col-span-1 sm:col-span-2">
                <x-datetime-picker label="Date"
                    class="focus:outline-none focus:ring-0"
                    placeholder="Schedule Date"
                    without-tips="true"
                    wire:model.defer="schedule_date" />
            </div>
            <div class="col-span-1 sm:col-span-2">
                <x-select label="Select Test Centers"
                    placeholder="Select Test Center"
                    multiselect
                    :options="$testCenters"
                    option-label="name"
                    option-value="id"
                    wire:model.defer="selectedTestCenters" />
            </div>
        </div>
        <x-slot name="footer">
            <div class="flex justify-end ">
                <div class="flex space-x-3">
                    <x-button flat
                        label="Cancel"
                        x-on:click="close" />
                    <x-button info
                        label="Save"
                        spinner="createSchedule"
                        wire:click="createSchedule" />
                </div>
            </div>
        </x-slot>
    </form>
</x-modal.card>
