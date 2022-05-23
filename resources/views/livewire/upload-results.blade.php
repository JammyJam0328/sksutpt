<div>
    <form>
        @csrf
        <x-input type="file"
            wire:model="file"
            label="Upload EXCEL FILE" />

        <div wire:loading
            wire:target="file"
            class="mt-3">
            reading file data ....
        </div>
        <div class="flex justify-end mt-4">
            @if ($file)
                <x-button info
                    wire:click="uploadExcel"
                    spinner="uploadExcel">
                    Upload
                </x-button>
            @endif
        </div>
    </form>
</div>
