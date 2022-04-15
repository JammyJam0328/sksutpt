<div>
    <x-button positive
        class="noprint"
        wire:click="$set('updatePhotoModal',true)">
        Update Photo
    </x-button>
    <x-modal.card title="Update Photo (PNG,JPG,JPEG)"
        wire:model.defer="updatePhotoModal">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="p-4 mb-2 border rounded-md bg-yellow-50">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-yellow-400"
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
                    <h3 class="text-sm font-medium text-yellow-800">Warning</h3>
                    <div class="mt-2 text-sm text-yellow-700">
                        <p>
                            Updating the photo will reflect to our existing records. Update only if your photo didnot
                            appear in your permit.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            @if ($new_photo)
                <h1 class="font-semibold text-green-500">File Uploaded</h1>
            @endif
        </div>
        <x-input type="file"
            label="Please provide current picture, white background passport size with name tag"
            wire:model.defer="new_photo"
            accept="image/*" />
        <div>
            <span class="mt-2 animate-pulse"
                wire:loading
                wire:target="new_photo">Uploading ...</span>
        </div>
        <x-slot name="footer">
            <div class="flex justify-end">
                <x-button info
                    wire:click="submitHandler"
                    spinner="submitHandler">
                    Save
                </x-button>
            </div>
        </x-slot>
    </x-modal.card>
</div>
