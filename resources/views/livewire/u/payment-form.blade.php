<div class="space-y-2">
    <div class="flex justify-end">
        <x-button gray>
            How to pay
        </x-button>
    </div>
    <x-card title="Payment Form">
        <x-slot name="action">
            <div>
                {{-- loading spinner --}}
                <svg wire:loading
                    wire:loading.class="animate-spin"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    class="fill-green-500 h-6 w-6">
                    <path fill="none"
                        d="M0 0h24v24H0z" />
                    <path
                        d="M3.055 13H5.07a7.002 7.002 0 0 0 13.858 0h2.016a9.001 9.001 0 0 1-17.89 0zm0-2a9.001 9.001 0 0 1 17.89 0H18.93a7.002 7.002 0 0 0-13.858 0H3.055z" />
                </svg>
            </div>
        </x-slot>
        <div class="mb-3">
            <div class="p-2 rounded-md border border-green-500">
                <ul>
                    <li class="text-gray-600">Total Amount to Pay : <span class="font-semibold">&#8369;
                            {{ $paymentDetails->amount_payable }}</span></li>
                </ul>
            </div>
        </div>
        <form class="  lg:px-0 lg:row-start-1 lg:col-start-1">
            @csrf
            <x-button positive>
                Pay with LinkBiz
            </x-button>
            <div class="mt-3">
                <x-input label="Upload Proof of Payment"
                    multiple
                    accept="image/*"
                    wire:model="proof_of_payments"
                    type="file" />
            </div>
            <div class="mt-3">
                <div wire:loading.remove
                    wire:target="proof_of_payments">
                    @if (count($proof_of_payments) > 0)
                        <div class="container grid grid-cols-3 gap-2 mx-auto">
                            @foreach ($proof_of_payments as $key => $image)
                                <div wire:key="proof-{{ $key }}-adadq2922"
                                    class="rounded border">
                                    <img class="h-40"
                                        src="{{ $image->temporaryUrl() }}"
                                        alt="image">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div wire:loading
                    wire:target="proof_of_payments">
                    <div class="flex justify-center items-center space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            class="animate-spin h-10 w-10 fill-gray-500">
                            <path fill="none"
                                d="M0 0h24v24H0z" />
                            <path
                                d="M3.055 13H5.07a7.002 7.002 0 0 0 13.858 0h2.016a9.001 9.001 0 0 1-17.89 0zm0-2a9.001 9.001 0 0 1 17.89 0H18.93a7.002 7.002 0 0 0-13.858 0H3.055z" />
                        </svg>
                        <h1>
                            Uploading...
                        </h1>
                    </div>
                </div>
            </div>
        </form>
        <x-slot name="footer">
            <div class="flex justify-end">
                <x-button wire:click="savePayment"
                    spinner="savePayment"
                    info>
                    Submit
                </x-button>
            </div>
        </x-slot>
    </x-card>
</div>
