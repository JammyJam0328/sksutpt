<x-modal.card wire:model.defer="scheduleDetailsModal"
    title="Schedule Details">
    <div>
        @if ($scheduleDetailsModal)
            <div>
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Date</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            @php
                                $date = new DateTime($this->schedule->date);
                                $date = $date->format('F d, Y H:i A');
                            @endphp
                            {{ $date }}
                        </dd>
                    </div>

                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Schedules</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            @foreach ($this->schedule->scheduleTestCenters as $scheduleTestCenter)
                                <p class="text-sm text-gray-900 sm:mt-0">
                                    {{ $scheduleTestCenter->testCenter->name }}
                                </p>
                            @endforeach
                        </dd>
                    </div>

                </dl>
            </div>
        @endif
    </div>

</x-modal.card>
