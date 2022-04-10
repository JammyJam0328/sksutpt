<x-modal wire:model.defer="optionModal"
    max-width="sm">
    <x-card title="Options">
        <div class="grid space-y-3">
            @if ($set_id != '')
                <x-button wire:click="viewApplication">
                    Show Application Details
                </x-button>
            @endif
        </div>
    </x-card>
</x-modal>
