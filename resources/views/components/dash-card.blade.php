 @props(['title', 'value'])
 <div class="relative flex items-center px-6 py-5 space-x-3 bg-white border border-green-500 rounded-lg shadow-sm ">
     <div class="flex-shrink-0">
         {{ $slot }}
     </div>
     <div class="flex-1 min-w-0">
         <div>
             <span class="absolute inset-0"
                 aria-hidden="true"></span>
             <p class="text-sm font-medium text-gray-900">{{ $title }}</p>
             <p class="text-sm text-gray-500 truncate">{{ $value }}</p>
         </div>
     </div>
 </div>
