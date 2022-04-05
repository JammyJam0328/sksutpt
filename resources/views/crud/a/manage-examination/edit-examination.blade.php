<x-modal.card wire:model.defer="editExaminationModal"
    title="Update Examination Details">
    <div>
        <form>
            @csrf
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="col-span-1 sm:col-span-2">
                    <x-input label="Title"
                        wire:model.defer="edit_title"
                        placeholder="Give a title for the examination" />
                </div>
                <div class="col-span-1 sm:col-span-2">
                    <x-datetime-picker label="Scheduled Date"
                        wire:model.defer="edit_date"
                        without-tips="true"
                        without-time="true"
                        placeholder="Schedule of the examination" />
                </div>
                <div class="col-span-1 sm:col-span-2">
                    <x-select label="School Year"
                        wire:model.defer="edit_school_year"
                        placeholder="Select School Year"
                        :options="['2022-2023', '2023-2024', '2024-2025', '2025-2026']" />
                </div>

            </div>
            <x-slot name="footer">
                <div class="flex justify-end">

                    <div class="flex space-x-2">
                        <x-button flat
                            label="Cancel"
                            x-on:click="close" />
                        <x-button info
                            label="Update"
                            wire:click="update" />
                    </div>
                </div>
            </x-slot>
        </form>
    </div>
</x-modal.card>
