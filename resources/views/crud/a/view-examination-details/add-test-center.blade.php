<x-modal.card title="Add New Test Center"
    wire:model.defer="addTestCenterModal">
    <form>
        @csrf
        <div>
            <x-select label="Select"
                wire:model.defer="selectedTestCenters"
                placeholder="Select Test Center"
                multiselect
                :options="$testCenters"
                option-label="name"
                option-value="id" />
        </div>
        <x-slot name="footer">
            <div class="flex justify-end">
                <div class="flex space-x-2">
                    <x-button flat
                        label="Cancel"
                        x-on:click="close" />
                    <x-button info
                        label="Save"
                        wire:click="save" />
                </div>
            </div>
        </x-slot>
    </form>
</x-modal.card>
