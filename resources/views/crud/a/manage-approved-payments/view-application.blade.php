<x-modal.card wire:model.defer="viewApplicationModal"
    title="Application Information"
    max-width="6xl">
    <div class="flex items-start w-full divide-x divide-gray-300">
        <div class="w-1/2 h-full p-2">
            @if ($set_id)
                <div>
                    <div>
                        <dl class="sm:divide-y sm:divide-gray-200">
                            <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $this->application->first_name }}
                                    {{ $this->application->middle_name }}
                                    {{ $this->application->last_name }}
                                    {{ $this->application->extension }}
                                </dd>
                            </div>
                            @if ($applicant_type == 'Freshmen')
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        First Choice
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->application->first_choice }}
                                    </dd>
                                </div>
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Second Choice
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->application->second_choice }}
                                    </dd>
                                </div>
                            @else
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Program Choice
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->application->program_choice }}
                                    </dd>
                                </div>
                            @endif

                            <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">
                                    Present Address
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $this->application->present_address }}
                                </dd>
                            </div>
                            <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">
                                    Permanent Address
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $this->application->permanent_address }}
                                </dd>
                            </div>
                            <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">
                                    Province
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $this->application->province }}
                                </dd>
                            </div>
                            <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">
                                    Sex
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $this->application->sex }}
                                </dd>
                            </div>
                            <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">
                                    Age
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $this->application->age }}
                                </dd>
                            </div>
                            <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">
                                    Date of Birth
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    @php
                                        $date = new DateTime($this->application->date_of_birth);
                                        echo $date->format('F d, Y');
                                    @endphp
                                </dd>
                            </div>
                            <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">
                                    Place of Birth
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $this->application->place_of_birth }}
                                </dd>
                            </div>
                            <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">
                                    Nationality
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $this->application->nationality }}
                                </dd>
                            </div>
                            <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">
                                    Civil Status
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $this->application->civil_status }}
                                </dd>
                            </div>
                            <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">
                                    Tribe
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $this->application->tribe }}
                                </dd>
                            </div>
                            <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">
                                    Religion
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $this->application->religion }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            @endif
        </div>
        <div class="w-1/2 h-full p-2">
            @if ($set_id)
                <div>
                    <div>
                        <dl class="sm:divide-y sm:divide-gray-200">
                            @if ($applicant_type == 'Freshmen')
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        School Last Attended
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->application->school_last_attended }}
                                    </dd>
                                </div>
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        School Last Attended Address
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->application->school_last_attended_address }}
                                    </dd>
                                </div>

                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Track and Strand Taken
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->application->track_and_strand_taken }}
                                    </dd>
                                </div>
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        School Year Graduated
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->application->school_year_graduated }}
                                    </dd>
                                </div>
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Awards/Honors Received
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->application->honor_or_awards_received }}
                                    </dd>
                                </div>
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Photo
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <a href="{{ Storage::url($this->application->photo) }}"
                                            target="_blank">
                                            <img src="{{ Storage::url($this->application->photo) }}"
                                                alt="Photo"
                                                class="h-32 duration-150 ease-in-out border rounded-md hover:scale-150 hover:shadow-xl">
                                        </a>
                                    </dd>
                                </div>
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Scanned Copy of GPA
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <a href="{{ Storage::url($this->application->copy_of_gpa) }}"
                                            target="blank"
                                            class="text-blue-600 underline">
                                            Open PDF
                                        </a>

                                    </dd>
                                </div>
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Principal/Head Certificate or School ID
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <a href="{{ Storage::url($this->application->principal_certification_or_school_id) }}"
                                            target="-blank"
                                            class="text-blue-600 underline">
                                            Open PDF
                                        </a>
                                    </dd>
                                </div>
                            @else
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Previous Program Taken
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->application->previous_program_taken }}
                                    </dd>
                                </div>
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Last School Attended
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->application->last_school_attended }}
                                    </dd>
                                </div>
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        School Year Last Attended
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $this->application->school_year_last_attended }}
                                    </dd>
                                </div>
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Photo
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <a href="{{ Storage::url($this->application->photo) }}"
                                            target="_blank">
                                            <img src="{{ Storage::url($this->application->photo) }}"
                                                alt="Photo"
                                                class="h-32 duration-150 ease-in-out border rounded-md hover:scale-150 hover:shadow-xl">
                                        </a>
                                    </dd>
                                </div>
                                <div class="py-4 sm:pb-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Honorable Dismissal or Good Moral
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <a href="{{ Storage::url($this->application->hd_or_good_moral) }}"
                                            target="-blank"
                                            class="text-blue-600 underline">
                                            Open PDF
                                        </a>
                                    </dd>
                                </div>
                            @endif

                        </dl>
                    </div>
                </div>
            @endif
        </div>
    </div>


</x-modal.card>
