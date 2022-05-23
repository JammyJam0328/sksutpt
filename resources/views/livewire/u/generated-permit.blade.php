<div>
    {{-- <div class="flex justify-end mb-2 space-x-3">
        @livewire('update-programs')
        @livewire('update-image-on-permit')
        <x-button icon="printer"
            class="noprint"
            x-on:click="window.print()"
            gray>
            Print
        </x-button>
    </div> --}}
    <div id="permit">
        <div class="overflow-hidden bg-white border-2 border-gray-600">
            <div class="flex items-center justify-between">
                <div class="flex items-center px-4 py-5 space-x-3 sm:px-6">
                    <div>
                        <img src="{{ asset('image/sksu1.png') }}"
                            alt="logo"
                            class="w-16 h-16">
                    </div>
                    <div class="-space-y-1 text-gray-700">
                        <h1 class="text-sm font-semibold">
                            Republic of the Philippines
                        </h1>
                        <h1 class="font-semibold text-green-700 ">
                            Sultan Kudarat State University
                        </h1>
                        <h1 class="text-sm font-semibold">
                            Access, EJC Montilla, 9800 City of Tacurong
                        </h1>
                        <h1 class="text-sm font-semibold">
                            Province of Sultan Kudarat
                        </h1>
                    </div>
                </div>
                <div class="pr-4">
                    <img src="{{ asset('image/logo2.png') }}"
                        alt="logo"
                        class="w-16 h-16">
                </div>
            </div>

            <div class="sm:p-0">
                <div class="flex w-full space-x-1">
                    <div class="w-1/4 p-2 mt-6 ">

                        <div class="grid justify-center w-full space-y-3">
                            <img src="{{ Storage::url($application->photo) }}"
                                class="w-full h-auto border max-h-48"
                                alt="...">
                            <div class="p-2 text-center text-gray-700 bg-gray-200 border">
                                <h1 class="font-bold">{{ auth()->user()->permit->permit_number }}</h1>
                                <h1 class="text-xs font-semibold uppercase">Examinee Number</h1>
                            </div>
                        </div>
                        <div class="p-3 mt-5 space-y-2 bg-gray-100">
                            <h1 class="text-xs font-bold">Confirmation :</h1>
                            <div>
                                <div class="mt-1 border-b border-gray-700 focus-within:border-indigo-600">
                                    <input type="text"
                                        disabled
                                        name="name"
                                        id="name"
                                        class="block w-full bg-gray-100 border-b border-transparent border-1 focus:border-indigo-600 focus:ring-0 sm:text-sm">
                                </div>
                                <label for="name"
                                    class="block text-xs font-medium text-center text-gray-700">Signature over printed
                                    name</label>
                            </div>
                            <div>
                                <div class="mt-1 border-b border-gray-700 focus-within:border-indigo-600">
                                    <input type="text"
                                        disabled
                                        name="name"
                                        id="name"
                                        class="block w-full bg-gray-100 border-0 border-b border-transparent focus:border-indigo-600 focus:ring-0 sm:text-sm">
                                </div>
                                <label for="name"
                                    class="block text-xs font-medium text-center text-gray-700">Date</label>
                            </div>

                        </div>

                    </div>

                    <div class="w-full text-gray-700">
                        <div class="border-b-4 border-gray-600">
                            <h1 class="text-2xl font-bold ">SKSU-TERTIARY PLACEMENT TEST PERMIT</h1>
                        </div>
                        <h1 class="text-xl font-semibold">Personal Information</h1>
                        <div class="w-full mb-2 space-y-1 overflow-hidden text-sm bg-white sm:rounded-lg">
                            <div class="grid grid-cols-6">
                                <div class="col-span-2">
                                    Date of Registration
                                </div>
                                <div class="col-span-4 underline">
                                    : {{ $application->created_at->format('F d, Y') }}
                                </div>

                                <div class="col-span-2">
                                    Name
                                </div>
                                <div class="col-span-4 underline">
                                    : {{ $application->first_name }} {{ $application->middle_name }}
                                    {{ $application->last_name }} {{ $application->extension }}
                                </div>
                                <div class="col-span-2">
                                    Address
                                </div>
                                <div class="col-span-4 underline">
                                    : {{ $application->permanent_address }}
                                </div>
                                <div class="col-span-2">
                                    Sex
                                </div>
                                <div class="col-span-4 underline">
                                    : {{ $application->sex }}
                                </div>
                                @if (auth()->user()->applicant_type == 'Freshmen')
                                    <div class="col-span-2">
                                        School Last Attended
                                    </div>
                                    <div class="col-span-4 underline">
                                        : {{ $application->school_last_attended }}
                                    </div>
                                    <div class="col-span-2">
                                        Senior High School Track
                                    </div>
                                    <div class="col-span-4 underline">
                                        : {{ $application->track_and_strand_taken }}
                                    </div>
                                    <div class="col-span-6">
                                        <h1 class="font-semibold">Preferred Degree Program :</h1>
                                    </div>
                                    <div class="flex col-span-1 space-x-2">
                                        <span>1<sup>st</sup></span> <span>Priority</span>
                                    </div>
                                    <div class="col-span-5 underline">
                                        : {{ $application->first_choice }}
                                    </div>
                                    <div class="flex col-span-1 space-x-2">
                                        <span>2<sup>nd</sup></span> <span>Priority</span>
                                    </div>
                                    <div class="col-span-5 underline">
                                        : {{ $application->second_choice }}
                                    </div>
                                @else
                                    <div class="col-span-2">
                                        Previous Program Taken
                                    </div>
                                    <div class="col-span-4 underline">
                                        : {{ $application->previous_program_taken }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="w-full border-t-4 border-gray-600">
                            <h1 class="text-xl font-semibold">Appointment Details</h1>
                            <div class="grid grid-cols-6">
                                <div class="col-span-2">
                                    Date of Examination
                                </div>
                                <div class="col-span-4 underline">
                                    {{ date('F d, Y', strtotime(auth()->user()->permit->examination_date)) }}
                                </div>
                                <div class="col-span-2">
                                    Time
                                </div>
                                <div class="col-span-4 underline">
                                    {{ auth()->user()->permit->examination_day_time }}
                                </div>
                                <div class="col-span-2">
                                    Test Center
                                </div>
                                <div class="col-span-4 underline">
                                    {{ auth()->user()->permit->testCenter->name }}
                                </div>
                                <div class="col-span-2">
                                    Room
                                </div>
                                <div class="col-span-4 underline">
                                    {{ auth()->user()->permit->examination_room }}
                                </div>
                                <div class="col-span-2">
                                    Seat Number
                                </div>
                                <div class="col-span-4 underline">
                                    #{{ auth()->user()->permit->chair_number }}
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-2 border-t-4 border-gray-600">
                            <h1 class="text-xl font-semibold">Important Reminders</h1>
                            <div class="w-full">
                                <ul class="pl-4 list-decimal">
                                    <li>
                                        All examinees are required to wear facemask, closed shoes, white polo shirt or
                                        shirt, long pants or skirt.
                                    </li>
                                    <li>
                                        All examinees are advised to proceed at the venue 30 minutes before the
                                        examination starts. Late examinees will not be entertained.
                                    </li>
                                    <li>
                                        You may visit the venue a day before examination to familiarize the room
                                        assignment.
                                    </li>
                                    <li>
                                        Parent/Guardian is NOT allowed to enter the university premises.
                                    </li>
                                    <li>
                                        Always wear your mask and maintain physical distancing.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-2 border-b-2 border-gray-600 border-x-2">
            <div class="flex justify-between">
                <div class="flex items-center justify-center space-x-2 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-3 h-3"
                        viewBox="0 0 16 16">
                        <path fill="#ECEFF1"
                            d="M2 2h12v12H2z" />
                        <path fill="#CFD8DC"
                            d="M8 9.262L14 14V4.646z" />
                        <path fill="#F44336"
                            d="M14.5 2H14L8 6.738 2 2h-.5A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14H2V4.646l6 4.615 6-4.616V14h.5a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                    </svg>
                    <span class="text-xs"> guidance@sksu.edu.ph</span>
                </div>
                <div class="flex items-center justify-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-3 h-3"
                        data-name="Ebene 1"
                        viewBox="0 0 1024 1024">
                        <path fill="#1877f2"
                            d="M1024,512C1024,229.23016,794.76978,0,512,0S0,229.23016,0,512c0,255.554,187.231,467.37012,432,505.77777V660H302V512H432V399.2C432,270.87982,508.43854,200,625.38922,200,681.40765,200,740,210,740,210V336H675.43713C611.83508,336,592,375.46667,592,415.95728V512H734L711.3,660H592v357.77777C836.769,979.37012,1024,767.554,1024,512Z" />
                        <path fill="#fff"
                            d="M711.3,660,734,512H592V415.95728C592,375.46667,611.83508,336,675.43713,336H740V210s-58.59235-10-114.61078-10C508.43854,200,432,270.87982,432,399.2V512H302V660H432v357.77777a517.39619,517.39619,0,0,0,160,0V660Z" />
                    </svg>
                    <span class="text-xs"> Sultan Kudarat State University</span>
                </div>
                <div class="flex items-center justify-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-3 h-3"
                        viewBox="0 0 48 48">
                        <g fill="#fff"
                            transform="translate(7.995 -1011.561)">
                            <circle cx="16.005"
                                cy="1035.561"
                                r="24"
                                fill="#239fdb"
                                fill-rule="evenodd" />
                            <path fill="#0b5ecd"
                                style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-transform:none;block-progression:tb"
                                d="M 30.205078 47.173828 A 23.999992 23.999992 0 0 0 30.419922 47.125 A 23.999992 23.999992 0 0 0 32.697266 46.369141 A 23.999992 23.999992 0 0 0 34.886719 45.388672 A 23.999992 23.999992 0 0 0 36.966797 44.195312 A 23.999992 23.999992 0 0 0 38.917969 42.800781 A 23.999992 23.999992 0 0 0 40.720703 41.216797 A 23.999992 23.999992 0 0 0 42.355469 39.460938 A 23.999992 23.999992 0 0 0 43.808594 37.550781 A 23.999992 23.999992 0 0 0 45.0625 35.505859 A 23.999992 23.999992 0 0 0 46.105469 33.345703 A 23.999992 23.999992 0 0 0 46.927734 31.091797 A 23.999992 23.999992 0 0 0 47.15625 30.197266 L 31.476562 14.517578 C 31.4681 14.509115 31.459659 14.500623 31.451172 14.492188 C 31.418128 14.459338 31.38106 14.430879 31.347656 14.398438 C 31.165421 14.221452 30.979675 14.047474 30.787109 13.882812 C 30.708812 13.815857 30.626804 13.754322 30.546875 13.689453 C 30.400417 13.570596 30.25329 13.453513 30.101562 13.341797 C 29.997538 13.265203 29.89155 13.192309 29.785156 13.119141 C 29.635524 13.01623 29.484189 12.916312 29.330078 12.820312 C 29.228843 12.757254 29.126517 12.696741 29.023438 12.636719 C 28.867844 12.546107 28.710384 12.458563 28.550781 12.375 C 28.438305 12.316122 28.325304 12.258438 28.210938 12.203125 C 28.052042 12.126255 27.890869 12.054239 27.728516 11.984375 C 27.613015 11.934676 27.498013 11.883982 27.380859 11.837891 C 27.183966 11.760425 26.984464 11.690126 26.783203 11.623047 C 26.702767 11.596243 26.62406 11.566133 26.542969 11.541016 C 26.249823 11.450192 25.953319 11.369094 25.652344 11.300781 C 25.770428 11.422781 25.886757 11.548947 25.998047 11.685547 C 26.458811 12.251347 26.873992 12.946478 27.240234 13.751953 C 27.367472 14.031786 27.478571 14.342754 27.59375 14.648438 L 24.833984 11.886719 C 24.811894 11.864629 24.789675 11.849369 24.767578 11.828125 C 24.717886 11.780305 24.668877 11.738874 24.619141 11.695312 C 24.517344 11.606247 24.414577 11.524514 24.3125 11.453125 C 24.250663 11.409846 24.188931 11.368887 24.126953 11.332031 C 24.029663 11.274225 23.931714 11.227679 23.833984 11.185547 C 23.776767 11.16085 23.719508 11.132657 23.662109 11.113281 C 23.534589 11.070315 23.405936 11.042385 23.277344 11.025391 C 23.252434 11.022093 23.22808 11.010147 23.203125 11.007812 C 23.122165 11.007812 23.042158 10.998047 22.960938 10.998047 L 22.960938 11 C 22.748494 11.01 22.535265 11.042041 22.318359 11.119141 C 21.941903 11.252046 21.561697 11.504873 21.191406 11.865234 C 21.140821 11.914464 21.091171 11.974089 21.041016 12.027344 L 20.324219 11.310547 C 19.687649 11.455672 19.070453 11.6513 18.476562 11.892578 C 17.882672 12.133856 17.311793 12.420687 16.769531 12.75 C 15.685008 13.408625 14.712986 14.235216 13.888672 15.197266 L 15.650391 16.958984 C 15.518903 16.917725 15.380275 16.881489 15.251953 16.837891 C 14.532291 16.593378 13.86352 16.312547 13.255859 15.998047 C 12.237952 17.414647 11.512581 19.063034 11.1875 20.865234 C 11.058802 21.578734 11.000302 22.290294 11 22.996094 L 12 23.996094 L 11.042969 23.996094 C 11.146892 25.241494 11.443686 26.450862 11.914062 27.585938 C 11.914062 27.585938 11.914062 27.587891 11.914062 27.587891 C 12.266744 28.438596 12.717477 29.246677 13.255859 29.996094 C 13.255859 29.996094 13.255859 29.998047 13.255859 29.998047 C 13.435169 30.247575 13.625595 30.490756 13.824219 30.726562 L 14.583984 31.486328 C 14.568723 31.492713 14.550349 31.497485 14.535156 31.503906 L 30.205078 47.173828 z "
                                color="#000"
                                font-family="sans-serif"
                                font-weight="400"
                                transform="translate(-7.995 1011.561)" />
                            <path
                                style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-transform:none;block-progression:tb"
                                d="m 13.966799,1023.3645 c 0.08122,-3e-4 0.161226,0.01 0.242187,0.01 0.684568,0.064 1.351592,0.4904 2.019532,1.3105 0.781742,0.96 1.476639,2.4647 1.980468,4.3477 -1.274561,0.2059 -2.635867,0.3231 -4.029296,0.332 -1.515448,0.01 -2.997478,-0.1123 -4.382813,-0.3359 0.206361,-0.7721 0.435712,-1.5051 0.707031,-2.1446 0.783385,-1.8462 1.817321,-3.0443 2.820313,-3.3984 0.216906,-0.077 0.430135,-0.1121 0.642578,-0.1191 z m 2.691406,0.3007 c 2.51637,0.5712 4.77913,1.942 6.453125,3.8965 -1.089782,0.5385 -2.424518,0.9749 -3.917969,1.2832 -0.527441,-2.0146 -1.267924,-3.6633 -2.189453,-4.7949 -0.11129,-0.1366 -0.227619,-0.2628 -0.345703,-0.3848 z m -5.328125,0.01 c -0.679114,0.7124 -1.262867,1.673 -1.7480468,2.8164 -0.3018184,0.7113 -0.5517106,1.5157 -0.7734374,2.3594 -1.4926092,-0.3073 -2.8214924,-0.7491 -3.9140626,-1.2891 1.6486294,-1.9241 3.8892658,-3.3062 6.4355468,-3.8867 z m 12.41211,4.6875 c 0.346602,0.4825 0.656305,0.9968 0.93164,1.5352 -0.979118,-0.4115 -2.035261,-0.6235 -3.103516,-0.5957 -0.06112,0 -0.122426,0.013 -0.183593,0.016 0.859679,-0.2697 1.649172,-0.5887 2.355469,-0.9551 z m -19.4804692,0 c 1.2153208,0.629 2.6757401,1.1241 4.296875,1.461 -0.2654696,1.251 -0.4430616,2.6102 -0.5175782,4.041 -0.026205,0.5032 -0.024195,0.999 -0.025391,1.4961 l -6.0097656,0 c 3.017e-4,-0.7058 0.058802,-1.4174 0.1875,-2.1309 0.3250815,-1.8022 1.0504529,-3.4506 2.0683598,-4.8672 z m 5.2851562,1.6367 c 1.469866,0.2411 3.034676,0.3697 4.638672,0.3594 1.473569,-0.01 2.912145,-0.129 4.263672,-0.3496 0.0052,0.024 0.01241,0.046 0.01758,0.07 -0.149267,0.073 -0.301254,0.1384 -0.447266,0.2227 -1.951237,1.1266 -3.198614,3.0039 -3.601562,5.0586 l -5.3984378,0 c -0.00117,-0.4796 -0.00574,-0.9582 0.019531,-1.4434 0.072612,-1.3942 0.2494988,-2.7129 0.5078125,-3.918 z m 12.048828,0.2989 c 2.30404,-0.06 4.566901,1.1095 5.802735,3.25 1.797495,3.1134 0.734475,7.0814 -2.378907,8.8789 -3.113351,1.7975 -7.081397,0.7345 -8.878906,-2.3789 -1.797496,-3.1134 -0.734476,-7.0833 2.378906,-8.8809 0.973097,-0.5618 2.02923,-0.8422 3.076172,-0.8691 z m 0.277344,1.498 c -0.241748,-0.01 -0.484634,0.01 -0.726563,0.037 -0.658981,0.082 -1.291638,0.3184 -1.876953,0.6563 -2.383311,1.376 -3.217221,4.4229 -1.839843,6.8086 1.377815,2.3865 4.452334,3.2163 6.839843,1.8379 2.386433,-1.3779 3.218267,-4.4504 1.839844,-6.8379 -0.905007,-1.5676 -2.544096,-2.4635 -4.236328,-2.502 z m -0.02344,1 c 1.352098,0.031 2.666892,0.745 3.392579,2.002 0.105336,0.1824 0.180177,0.372 0.253906,0.5625 l -7.441406,0 c 0.320394,-0.8118 0.893042,-1.5314 1.714843,-2.0059 0.490663,-0.2832 0.998974,-0.4672 1.5,-0.5293 0.193074,-0.024 0.386922,-0.034 0.580078,-0.029 z m -19.8007809,3.5645 5.9765625,0 c 0.061355,1.9573 0.3074127,3.833 0.7382813,5.4961 -1.4488186,0.2885 -2.77684,0.7069 -3.9335938,1.2343 -1.5916409,-1.8896 -2.5734035,-4.2396 -2.78125,-6.7304 z m 6.9882813,0 5.2499996,0 c -0.0849,1.4154 0.225864,2.8703 0.986329,4.1875 0.182422,0.3159 0.390024,0.606 0.609374,0.8847 -2.071405,-0.1382 -4.147037,-0.053 -6.0800776,0.2442 -0.4238647,-1.589 -0.6899257,-3.4082 -0.765625,-5.3164 z m 8.7597656,0 7.953125,0 c 0.167107,1.5316 -0.559309,3.0896 -1.980469,3.9101 -1.916404,1.1065 -4.365606,0.4449 -5.472656,-1.4726 -0.445489,-0.7717 -0.593412,-1.6223 -0.5,-2.4375 z m -4.169922,6.0039 c 1.098542,-0.016 2.210327,0.038 3.306641,0.1562 0.26481,0.2232 0.542069,0.4288 0.832031,0.6113 -0.725712,1.9924 -1.681154,3.3203 -2.609375,3.8809 -0.301223,0.182 -0.596296,0.2911 -0.890625,0.3379 -0.196417,0 -0.393012,0.01 -0.589844,0 -0.459739,-0.078 -0.926662,-0.3327 -1.421875,-0.795 -0.851983,-0.7952 -1.587665,-2.1869 -2.15039,-3.9082 1.131671,-0.167 2.31685,-0.2676 3.523437,-0.2851 z m -4.564453,0.4648 c 0.5592717,1.7522 1.321036,3.226 2.283203,4.2246 -0.860694,-0.1958 -1.711344,-0.4789 -2.533203,-0.873 -1.2396145,-0.5945 -2.3369545,-1.383 -3.2714844,-2.3125 1.0316061,-0.436 2.2212853,-0.7879 3.5214844,-1.0391 z m 17.015625,0.1 3.855469,6.6797 c 0.14282,0.2474 0.06572,0.5408 -0.181641,0.6836 -0.247364,0.1428 -0.540744,0.064 -0.683594,-0.1836 l -3.847656,-6.6641 c 0.09958,-0.052 0.200702,-0.096 0.298828,-0.1523 0.194169,-0.1121 0.378386,-0.2369 0.558594,-0.3633 z m -7.427734,0.6797 c 1.048008,0.4779 2.195837,0.7161 3.353515,0.6817 -1.541101,1.3822 -3.381162,2.316 -5.333984,2.7617 0.776431,-0.809 1.436392,-1.9841 1.980469,-3.4434 z"
                                color="#000"
                                font-family="sans-serif"
                                font-weight="400"
                                overflow="visible"
                                transform="translate(.999 -.803)" />
                        </g>
                    </svg>
                    <span class="text-xs"> www.sksu.edu.ph</span>
                </div>

            </div>
        </div>
    </div>


</div>
