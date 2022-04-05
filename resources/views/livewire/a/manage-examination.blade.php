<x-admin-page-layout>
    <x-slot name="title">
        <x-card class="flex items-center justify-between shadow">
            <div class="flex space-x-3 text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7"
                    viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                        clip-rule="evenodd" />
                    <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                </svg>
                <h1 class="text-2xl font-semibold ">Manage Examinations</h1>
            </div>
            <div id="page-actions"
                class="flex space-x-2">
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
                <x-input icon="search"
                    wire:model.debounce.500ms="searchTerm"
                    placeholder="Search" />
            </div>
        </x-card>
    </x-slot>
    <x-card class="shadow">
        @include('crud.a.manage-examination.examination-table')
        @include('crud.a.manage-examination.create-examination')
        @include('crud.a.manage-examination.edit-examination')
        @include('crud.a.manage-examination.options')
    </x-card>
</x-admin-page-layout>
