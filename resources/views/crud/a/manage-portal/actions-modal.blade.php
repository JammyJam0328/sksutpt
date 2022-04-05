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

            @if ($set_id)
                <x-button
                    href="{{ route('admin.manage.portal.schedules', [
                        'portal_id' => $set_id ? $set_id : '00',
                    ]) }}"
                    icon="calendar">
                    Manage Schedule
                </x-button>
            @else
                <x-button icon="calendar">
                    Manage Schedule <span class="text-red-500">
                        (No Portal Selected)
                    </span>
                </x-button>
            @endif

            <x-button icon="eye">
                View Details
            </x-button>

        </div>

    </x-card>

</x-modal>
