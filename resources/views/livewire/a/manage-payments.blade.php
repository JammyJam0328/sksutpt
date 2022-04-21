<x-admin-page-layout>
    <x-slot name="title">
        <x-card class="flex items-center justify-between shadow">
            <div class="flex space-x-3 text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-7 w-7"
                    viewBox="0 0 20 20"
                    fill="currentColor">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                    <path fill-rule="evenodd"
                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                        clip-rule="evenodd" />
                </svg>
                <h1 class="text-2xl font-semibold ">Manage Payments | To Review</h1>
            </div>
            <div x-data="{ filter: '1' }"
                x-init="$watch('filter', value => {
                    if (value == 1) {
                        window.location.href = '{{ route('admin.manage.payments') }}'
                    } else if (value == 2) {
                        window.location.href = '{{ route('admin.manage.all-payments') }}'
                    } else if (value == 3) {
                        window.location.href = '{{ route('admin.manage.denied-payments') }}'
                    }
                })"
                id="page-actions"
                class="flex space-x-2">
                <x-input icon="search"
                    wire:model.debounce.500ms="searchTerm" />
                <x-button wire:click="$refresh">
                    <svg wire:loading.class="animate-spin fill-green-600"
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 fill-gray-500"
                        viewBox="0 0 24 24">
                        <path fill="none"
                            d="M0 0h24v24H0z" />
                        <path
                            d="M5.463 4.433A9.961 9.961 0 0 1 12 2c5.523 0 10 4.477 10 10 0 2.136-.67 4.116-1.81 5.74L17 12h3A8 8 0 0 0 6.46 6.228l-.997-1.795zm13.074 15.134A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12c0-2.136.67-4.116 1.81-5.74L7 12H4a8 8 0 0 0 13.54 5.772l.997 1.795z" />
                    </svg>
                </x-button>
                <x-native-select x-model="filter">
                    <option value="1">To Review</option>
                    <option value="2">Approved</option>
                    <option value="3">Denied
                    </option>
                </x-native-select>
            </div>
        </x-card>
    </x-slot>
    <x-card class="shadow">
        @include('crud.a.manage-payments.payments-table')
        @include('crud.a.manage-payments.option-modal')
        @include('crud.a.manage-payments.show-proofs')
        @include('crud.a.manage-payments.view-application')
    </x-card>
</x-admin-page-layout>
