<x-modal wire:model.defer="optionModal"
    max-width="sm">
    <x-card title="Options">
        <div class="grid space-y-3">
            @if ($set_id != '')
                @if ($this->payment->user->applicant_state == 'payment_submitted')
                    <x-button wire:click="showProofs">
                        Show Proofs of Payment
                    </x-button>
                @endif
                <x-button>
                    Show Application Details
                </x-button>
            @endif
        </div>
    </x-card>
</x-modal>
