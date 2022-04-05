<x-modal.card wire:model.defer="showProofModal"
    max-width="5xl"
    title="Proof of Payments">
    @if ($set_id != '')
        <div>
            <div class="mb-2">
                <div class="p-4 rounded-md bg-blue-50">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-400"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-1 ml-3 md:flex md:justify-between">
                            <p class="text-sm text-blue-700">
                                Please open your Link Biz account to verify proof of payments.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="container grid grid-cols-3 gap-2 mx-auto">
                    @foreach ($this->payment->proofs as $proof)
                        <div class="w-full rounded">
                            <img class="duration-150 ease-in-out hover:scale-150"
                                src="{{ Storage::url($proof->file_name) }}"
                                alt="image">
                        </div>
                    @endforeach
                </div>
            </div>
            @if ($this->payment->payment_status == 'pending')
                <x-slot name="footer">
                    <div class="flex items-center justify-between">
                        <x-button wire:click="rejectPaymentConfirmation"
                            negative>
                            Deny
                        </x-button>
                        <x-button wire:click="approvePaymentConfirmation"
                            info>
                            Approve
                        </x-button>
                    </div>
                </x-slot>
            @endif
        </div>
    @else
        <div>
            <h1>
                Something went wrong.
            </h1>
        </div>
    @endif
</x-modal.card>
