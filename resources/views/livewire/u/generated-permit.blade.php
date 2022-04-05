<div>
    <div class="flex justify-end mb-2">
        <x-button icon="printer"
            x-on:click="const printContents = document.getElementById('permit').innerHTML;
            const originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;"
            gray>
            Print
        </x-button>
    </div>
    <div id="permit"
        class="p-5">
        <div class="overflow-hidden bg-white border-2 border-gray-600">
            <div class="flex items-center px-4 py-5 space-x-3 sm:px-6">
                <div>
                    <img src="{{ asset('image/sksu1.png') }}"
                        alt="logo"
                        class="h-14 w-14">
                </div>
                <div class="grid text-gray-600">
                    <h1 class="text-lg font-semibold">
                        Sultan Kudarat State University
                    </h1>
                    <h1>
                        Examination Permit
                    </h1>
                </div>
            </div>
            <div class="px-4 py-5 border-t-2 border-gray-600 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-500">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Permit Number</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $permit->permit_number }}
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Examinee</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $permit->user->name }}
                        </dd>
                    </div>

                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Test Center
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $permit->testCenter->name }}
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Examination Date
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{-- display date like March 28 2000 --}}
                            @php
                                $date = new DateTime($permit->examination->date);
                                $date = $date->format('F d Y');
                            @endphp
                            {{ $date }}
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Day Time Schedule
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $permit->examination_day_time }}
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Seat Number
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $permit->chair_number }}
                        </dd>
                    </div>

                </dl>
            </div>
        </div>
    </div>


</div>
