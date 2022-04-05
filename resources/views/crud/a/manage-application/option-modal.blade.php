<x-modal wire:model.defer="optionModal"
    title="Application Details"
    max-width="sm">
    <x-card title="Options">

        <div class="grid space-y-3">
            @if ($set_id != '')
                <x-button wire:click="viewApplication"
                    icon="eye">
                    View Details
                </x-button>
            @endif
        </div>

    </x-card>

</x-modal>
