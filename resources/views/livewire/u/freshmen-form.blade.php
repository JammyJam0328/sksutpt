<x-card title="Freshemen Application">
    <form class="bg-white">
        <div class="fixed z-50 top-24 right-1">
            <svg wire:loading
                wire:loading.class="animate-spin"
                xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                viewBox="0 0 24 24">
                <path fill="none"
                    d="M0 0h24v24H0z" />
                <path
                    d="M5.463 4.433A9.961 9.961 0 0 1 12 2c5.523 0 10 4.477 10 10 0 2.136-.67 4.116-1.81 5.74L17 12h3A8 8 0 0 0 6.46 6.228l-.997-1.795zm13.074 15.134A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12c0-2.136.67-4.116 1.81-5.74L7 12H4a8 8 0 0 0 13.54 5.772l.997 1.795z" />
            </svg>
            <svg wire:loading.remove
                xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 text-green-600"
                viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        @csrf
        <div class="space-y-8 divide-y divide-gray-200">
            <div>
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Select Program</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Select the program you want to enroll in.
                    </p>
                </div>
                <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="space-y-2 sm:col-span-6 ">
                        <x-native-select label="First Choice"
                            wire:model="first_choice_campus">
                            <option value="">Select Campus</option>
                            @foreach ($campuses as $campuse)
                                <option value="{{ $campuse->id }}">{{ $campuse->name }}</option>
                            @endforeach
                        </x-native-select>
                        <x-native-select wire:model="first_choice">
                            <option value="">Select Program</option>
                            @foreach ($firstChoicePrograms as $program)
                                <option value="{{ $program->name }}">{{ $program->name }}</option>
                            @endforeach
                        </x-native-select>
                    </div>
                    <div class="space-y-2 sm:col-span-6 ">
                        <x-native-select label="Second Choice"
                            wire:model="second_choice_campus">
                            <option value="">Select Campus</option>
                            @foreach ($campuses as $campuse)
                                <option value="{{ $campuse->id }}">{{ $campuse->name }}</option>
                            @endforeach
                        </x-native-select>
                        {{-- <x-select label="Second Choice"
                            placeholder="Select Campus"
                            :options="$campuses"
                            option-label="name"
                            option-value="id"
                            wire:model="second_choice_campus" /> --}}

                        <x-native-select wire:model="second_choice">
                            <option value="">Select Program</option>
                            @foreach ($secondChoicePrograms as $program)
                                <option value="{{ $program->name }}">{{ $program->name }}</option>
                            @endforeach
                        </x-native-select>
                        {{-- <x-select placeholder="Select Program"
                            :options="$secondChoicePrograms"
                            option-label="name"
                            option-value="name"
                            wire:model.lazy="second_choice" /> --}}
                    </div>
                </div>
            </div>
            <div class="pt-8">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                </div>
                <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <x-input label="First Name"
                            placeholder="First Name"
                            wire:model.lazy="first_name" />
                    </div>
                    <div class="sm:col-span-3">
                        <x-input label="Middle Name"
                            placeholder="Middle Name"
                            wire:model.lazy="middle_name" />
                    </div>
                    <div class="sm:col-span-3">
                        <x-input label="Last Name"
                            placeholder="Last Name"
                            wire:model.lazy="last_name" />
                    </div>
                    <div class="sm:col-span-3">
                        <x-input label="Extension"
                            placeholder="eg. Jr, Sr, III"
                            wire:model.lazy="extension" />
                    </div>
                    <div class="sm:col-span-6">
                        <x-input label="Preset Address"
                            placeholder="Preset Address"
                            wire:model.lazy="present_address" />
                    </div>
                    <div class="sm:col-span-6">
                        <x-input label="Permanent Address"
                            placeholder="Permanent Address"
                            wire:model.lazy="permanent_address" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-native-select label="Sex"
                            wire:model.lazy="sex">
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </x-native-select>
                    </div>
                    <div class="sm:col-span-2">
                        <x-input label="Date of Birth"
                            placeholder="Date of Birth"
                            wire:model.lazy="date_of_birth"
                            type="date" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-input label="Age"
                            placeholder="Age"
                            wire:model.lazy="age" />
                    </div>
                    <div class="sm:col-span-6">
                        <x-input label="Place of Birth"
                            placeholder="Place of Birth"
                            wire:model.lazy="place_of_birth" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-input label="Nationality"
                            placeholder="Nationality"
                            wire:model.lazy="nationality" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-input label="Citizenship"
                            placeholder="Citizenship"
                            wire:model.lazy="citizenship" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-native-select label="Civil Status"
                            wire:model.lazy="civil_status">
                            <option value="">Select</option>
                            <option value="Single">Single</option>
                            <option value="Maried">Maried</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                        </x-native-select>
                    </div>
                    <div class="sm:col-span-3">
                        <x-input label="Tribe"
                            placeholder="Tribe"
                            wire:model.lazy="tribe" />
                    </div>
                    <div class="sm:col-span-3">
                        <x-input label="Religion"
                            placeholder="Religion"
                            wire:model.lazy="religion" />
                    </div>
                </div>
            </div>
            {{-- shs information --}}
            <div>
                <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-6">
                        <x-input label="Last School Attended"
                            placeholder="Last School Attended"
                            wire:model.lazy="school_last_attended" />
                    </div>
                    <div class="sm:col-span-6">
                        <x-input label="Last School Attended Address"
                            placeholder="Last School Attended Address"
                            wire:model.lazy="school_last_attended_address" />
                    </div>
                    <div class="sm:col-span-6">
                        <x-native-select label="Track/Strand Taken"
                            wire:model.lazy="track_and_strand_taken">
                            <option value="">Select</option>
                            @foreach ($this->getTrackStrands() as $trackStrand)
                                <option value="{{ $trackStrand }}">{{ $trackStrand }}</option>
                            @endforeach
                        </x-native-select>

                    </div>
                    <div class="sm:col-span-3">
                        <x-native-select label="School Year Graduated"
                            wire:model.lazy="school_year_graduated">
                            <option value="">Select</option>
                            <option value="2012-2013">2012-2013</option>
                            <option value="2013-2014">2013-2014</option>
                            <option value="2014-2015">2014-2015</option>
                            <option value="2015-2016">2015-2016</option>
                            <option value="2016-2017">2016-2017</option>
                            <option value="2017-2018">2017-2018</option>
                            <option value="2018-2019">2018-2019</option>
                            <option value="2019-2020">2019-2020</option>
                            <option value="2020-2021">2020-2021</option>
                            <option value="2021-2022">2021-2022</option>
                            <option value="2022-2023">2022-2023</option>
                        </x-native-select>

                    </div>
                    <div class="sm:col-span-3">
                        <x-input label="Honor/Award Received"
                            placeholder="Honor/Award Received"
                            wire:model.lazy="honor_or_awards_received" />
                    </div>
                </div>
            </div>
            {{-- uploads --}}
            <div>
                <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="space-y-2 sm:col-span-6">
                        <div wire:key="photo-upload-12345"
                            class="flex justify-start">
                            <div wire:loading.remove
                                wire:target="photo">
                                @if ($photo)
                                    <img src="{{ \Storage::url($photo) }}"
                                        alt="photo"
                                        class="h-56 border rounded-md max-h-56">
                                @endif
                            </div>
                            <div wire:loading
                                wire:target="photo"
                                wire:loading.class="animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 text-green-700"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                </svg>
                            </div>
                        </div>
                        <x-input label="Upload Photo"
                            type="file"
                            placeholder="Upload Photo"
                            wire:model.debounce.500ms="photo" />
                    </div>
                    <div class="space-y-2 sm:col-span-6">
                        <div wire:key="copy_of_gpa-upload-12345"
                            class="flex justify-start">
                            <div wire:loading.remove
                                wire:target="copy_of_gpa">
                                @if ($copy_of_gpa)
                                    <img src="{{ \Storage::url($copy_of_gpa) }}"
                                        alt="photo"
                                        class="h-56 border rounded-md max-h-56">
                                @endif
                            </div>
                            <div wire:loading
                                wire:target="copy_of_gpa"
                                wire:loading.class="animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 text-green-700"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                </svg>
                            </div>
                        </div>
                        <x-input label="Scanned Copy of Your SHS First semester GPA"
                            type="file"
                            placeholder="Upload"
                            wire:model.debounce.500ms="copy_of_gpa" />
                    </div>
                    <div class="space-y-2 sm:col-span-6">
                        <div wire:key="principal_certification-upload-12345"
                            class="flex justify-start">
                            <div wire:loading.remove
                                wire:target="principal_certification">
                                @if ($principal_certification)
                                    <img src="{{ \Storage::url($principal_certification) }}"
                                        alt="photo"
                                        class="h-56 border rounded-md max-h-56">
                                @endif
                            </div>
                            <div wire:loading
                                wire:target="principal_certification"
                                wire:loading.class="animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 text-green-700"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                </svg>
                            </div>
                        </div>
                        <x-input label="Principal/Head Certification"
                            type="file"
                            placeholder="Upload"
                            wire:model.debounce.500ms="principal_certification" />
                    </div>
                    <div class="space-y-2 sm:col-span-6">
                        <div wire:key="last_school_id-upload-12345"
                            class="flex justify-start">
                            <div wire:loading.remove
                                wire:target="last_school_id">
                                @if ($last_school_id)
                                    <img src="{{ \Storage::url($last_school_id) }}"
                                        alt="photo"
                                        class="h-56 border rounded-md max-h-56">
                                @endif
                            </div>
                            <div wire:loading
                                wire:target="last_school_id"
                                wire:loading.class="animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-10 h-10 text-green-700"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                </svg>
                            </div>
                        </div>
                        <x-input label="Last Attended School ID"
                            type="file"
                            placeholder="Upload"
                            wire:model.debounce.500ms="last_school_id" />
                    </div>
                </div>
            </div>
        </div>
        <x-slot name="footer">
            <div class="flex justify-end">
                <x-button wire:click="saveConfirmation"
                    spinner="saveConfirmation"
                    info>
                    Save</x-button>
            </div>
        </x-slot>
    </form>
</x-card>
