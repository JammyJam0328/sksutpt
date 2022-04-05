<x-modal wire:model.defer="optionModal"
    max-width="sm">

    <x-card title="Options">

        <div class="grid space-y-3">

            <x-button wire:click="edit"
                icon="pencil">
                Edit
            </x-button>

            <x-button wire:click="confirmDelete"
                icon="trash">
                Delete
            </x-button>

            @if ($set_id != '')
                <x-button
                    href="{{ route('admin.examination.details', [
                        'examination_id' => $set_id,
                    ]) }}"
                    icon="eye">
                    View Details
                </x-button>
            @endif

        </div>

    </x-card>

</x-modal>
