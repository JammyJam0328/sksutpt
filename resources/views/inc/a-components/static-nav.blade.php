   <div class="flex flex-col flex-1 min-h-0 bg-white border-r shadow">
       <div class="flex flex-col flex-1 px-3 pt-5 pb-4 overflow-y-auto">
           <div class="flex items-center flex-shrink-0 px-4 py-3 space-x-2 bg-green-600 rounded-lg">
               <img class="w-12 h-12"
                   src="{{ asset('image/sksu1.png') }}"
                   alt="...">
               <h1 class="text-2xl font-bold text-white">SKSU PAS</h1>
           </div>
           <nav class="flex-1 px-2 mt-5 space-y-1 bg-white">
               <x-slink link="{{ route('admin.dashboard') }}"
                   active="{{ Request::routeIs('admin.dashboard') }}"
                   label="Dashboard">
                   <svg class="flex-shrink-0 w-6 h-6 mr-3"
                       xmlns="http://www.w3.org/2000/svg"
                       fill="none"
                       viewBox="0 0 24 24"
                       stroke="currentColor"
                       aria-hidden="true">
                       <path stroke-linecap="round"
                           stroke-linejoin="round"
                           stroke-width="2"
                           d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                   </svg>
               </x-slink>
               <x-slink link="{{ route('admin.manage.examinations') }}"
                   active="{{ Request::routeIs('admin.manage.examinations') }}"
                   label="Examination">
                   <svg xmlns="http://www.w3.org/2000/svg"
                       class="flex-shrink-0 w-6 h-6 mr-3"
                       fill="none"
                       viewBox="0 0 24 24"
                       stroke="currentColor"
                       stroke-width="2">
                       <path stroke-linecap="round"
                           stroke-linejoin="round"
                           d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                   </svg>
               </x-slink>
               <x-slink link="{{ route('admin.manage.applications') }}"
                   active="{{ Request::routeIs('admin.manage.applications') }}"
                   label="Applications">
                   <svg xmlns="http://www.w3.org/2000/svg"
                       class="flex-shrink-0 w-6 h-6 mr-3"
                       fill="none"
                       viewBox="0 0 24 24"
                       stroke="currentColor"
                       stroke-width="2">
                       <path stroke-linecap="round"
                           stroke-linejoin="round"
                           d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                   </svg>
               </x-slink>
               <x-slink link="{{ route('admin.manage.payments') }}"
                   active="{{ Request::routeIs('admin.manage.payments') }}"
                   label="Payments">
                   <svg xmlns="http://www.w3.org/2000/svg"
                       class="flex-shrink-0 w-6 h-6 mr-3"
                       fill="none"
                       viewBox="0 0 24 24"
                       stroke="currentColor"
                       stroke-width="2">
                       <path stroke-linecap="round"
                           stroke-linejoin="round"
                           d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                   </svg>
               </x-slink>
               <x-slink link="{{ route('admin.generate.reports') }}"
                   active="{{ Request::routeIs('admin.generate.reports') }}"
                   label="Reports">
                   <svg xmlns="http://www.w3.org/2000/svg"
                       class="flex-shrink-0 w-6 h-6 mr-3"
                       fill="none"
                       viewBox="0 0 24 24"
                       stroke="currentColor"
                       stroke-width="2">
                       <path stroke-linecap="round"
                           stroke-linejoin="round"
                           d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                   </svg>
               </x-slink>
               <form method="POST"
                   action="{{ route('logout') }}"
                   x-data>
                   @csrf
                   <a href="{{ route('logout') }}"
                       class="flex items-center px-2 py-2 font-medium text-gray-600 bg-white rounded-md group hover:bg-green-600 hover:text-white"
                       @click.prevent="$root.submit();">
                       <svg xmlns="http://www.w3.org/2000/svg"
                           class="flex-shrink-0 w-6 h-6 mr-3"
                           fill="none"
                           viewBox="0 0 24 24"
                           stroke="currentColor"
                           stroke-width="2">
                           <path stroke-linecap="round"
                               stroke-linejoin="round"
                               d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                       </svg>
                       <span class="mt-1">Log out</span>
                   </a>
               </form>
           </nav>
       </div>
   </div>
