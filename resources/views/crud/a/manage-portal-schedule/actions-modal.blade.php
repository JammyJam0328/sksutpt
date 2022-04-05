<x-modal wire:model.defer="actionModal"
    max-width="sm">

    <x-card title="Options">

        <div class="grid space-y-3">

            <x-button wire:click="edit"
                icon="pencil">
                Edit
            </x-button>

            <x-button wire:click="deleteConfirmation"
                icon="trash">
                Delete
            </x-button>

            <x-button wire:click="viewDetails"
                icon="eye">
                View Details
            </x-button>

        </div>

    </x-card>

</x-modal>
