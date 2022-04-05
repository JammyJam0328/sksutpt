<div class="space-y-2">
    <div class="flex justify-end">
        <x-button gray>
            How to pay
        </x-button>
    </div>
    <x-card title="Payment Form">
        <div class="mb-3">
            <div class="p-2 rounded-md border border-green-500">
                <ul>
                    <li class="text-gray-600">Total Amount to Pay : <span class="font-semibold">&#8369; 275</span></li>
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
                    wire:model.defer="proof_of_payment"
                    type="file" />
            </div>
        </form>
        <x-slot name="footer">
            <div class="flex justify-end">
                <x-button info>
                    Submit
                </x-button>
            </div>
        </x-slot>
    </x-card>
</div>
