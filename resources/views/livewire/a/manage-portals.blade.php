<x-admin-page-layout>
    <x-slot name="title">
        <x-card class="flex items-center justify-between shadow">
            <div class="flex space-x-3 text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-7 w-7"
                    viewBox="0 0 20 20"
                    fill="currentColor">
                    <path
                        d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z" />
                </svg>
                <h1 class="text-2xl font-semibold ">Manage Portals</h1>
            </div>
            <div id="page-actions"
                class="flex space-x-2">
                <x-button wire:click="$refresh">
                    <svg wire:loading.class="animate-spin fill-green-600"
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 fill-gray-600"
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
        @include('crud.a.manage-portal.portal-table')
        @include('crud.a.manage-portal.create-portal')
        @include('crud.a.manage-portal.edit-portal')
        @include('crud.a.manage-portal.actions-modal')
        @include('crud.a.manage-portal.manage-schedule-modal')
    </x-card>
</x-admin-page-layout>
