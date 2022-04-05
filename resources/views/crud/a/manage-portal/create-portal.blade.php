<x-modal.card title="Create Portal"
    class="z-50"
    wire:model.defer="createPortalModal"
    blur>
    <form>
        @csrf
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="col-span-1 sm:col-span-2">
                <x-input label="Title"
                    wire:model.defer="title"
                    class="focus:ring-0"
                    placeholder="Portal Title" />
            </div>
            <div class="col-span-1 sm:col-span-2">
                <x-native-select label="School Year"
                    wire:model.defer="school_year">
                    <option value=""
                        selected
                        disabled>Select School Year</option>
                    @foreach ($schoolYears as $sy)
                        <option value="{{ $sy }}">{{ $sy }}</option>
                    @endforeach
                </x-native-select>
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
                        spinner="create"
                        wire:click="create" />
                </div>
            </div>
        </x-slot>
    </form>
</x-modal.card>
