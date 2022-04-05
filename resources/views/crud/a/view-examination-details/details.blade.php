<div class="overflow-hidden bg-white border sm:rounded-lg">
    <div class="flex justify-between px-4 py-5 sm:px-6">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Examination Details</h3>
        <x-button wire:click="$set('addTestCenterModal',true)"
            info>
            Add Test Center
        </x-button>
    </div>
    <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
        <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Title</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $this->examination->title }}
                </dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">School Year</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $this->examination->school_year }}
                </dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Date</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    @php
                        $date = new DateTime($this->examination->date);
                    @endphp
                    {{ $date->format('F d, Y') }}
                </dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Test Center/s</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <ul class="list-disc spacy-y-2">
                        @forelse ($examinationTestCenters as $examinationTestCenter)
                            <li>
                                {{ $examinationTestCenter->testCenter->name }}
                            </li>
                        @empty
                            <li>
                                No Test Center
                            </li>
                        @endforelse
                    </ul>
                </dd>
            </div>
        </dl>
    </div>
</div>
