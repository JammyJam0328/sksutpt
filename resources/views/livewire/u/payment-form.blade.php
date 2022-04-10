<div class="space-y-2">
    <div class="py-2 mb-2">
        <div class="rounded-md bg-yellow-50 p-4 border border-yellow-500">
            <div class="flex">
                <div class="flex-shrink-0">
                    <!-- Heroicon name: solid/exclamation -->
                    <svg class="h-5 w-5 text-yellow-400"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800">Attention needed</h3>
                    <div class="mt-2 text-sm text-yellow-700">
                        <p>
                            Please make sure that the reference number is clearly reflected in your proof of payment.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <x-card title="Payment Form">
        <x-slot name="action">
            <div>
                <svg wire:loading
                    wire:loading.class="animate-spin"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    class="w-6 h-6 fill-green-500">
                    <path fill="none"
                        d="M0 0h24v24H0z" />
                    <path
                        d="M3.055 13H5.07a7.002 7.002 0 0 0 13.858 0h2.016a9.001 9.001 0 0 1-17.89 0zm0-2a9.001 9.001 0 0 1 17.89 0H18.93a7.002 7.002 0 0 0-13.858 0H3.055z" />
                </svg>
            </div>
        </x-slot>
        <div class="mb-3">
            <div class="p-2 border border-green-500 rounded-md">
                <ul>
                    <li class="text-gray-600">Total Amount to Pay : <span class="font-semibold">&#8369;
                            {{ $paymentDetails->amount_payable }}</span></li>
                </ul>
            </div>
        </div>
        <form class=" lg:px-0 lg:row-start-1 lg:col-start-1">
            @csrf
            <x-button
                href="https://epaymentportal.landbank.com/pay1.php?code=S05EUEtVSGltb2t0emdaNmwyRFV5aG1pVVYzNHdTRXByL2ZoNHZjS1pZRT0="
                target="_blank"
                positive>
                Pay with LinkBiz
            </x-button>
            <div class="mt-3">
                <x-input label="Upload Proof of Payment (Screenshot or actual photo of payment receipt)"
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
                                    class="border rounded">
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
                    <div class="flex items-center justify-center space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            class="w-10 h-10 animate-spin fill-gray-500">
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
