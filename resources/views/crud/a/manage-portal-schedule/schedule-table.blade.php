 <div>
     <div class="sm:flex sm:items-center">
         <div class="sm:flex-auto">
             <h1 class="text-xl font-semibold ">List of Schedules</h1>
         </div>
         <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
             <x-button wire:click="$set('createScheduleModal',true)"
                 icon="plus"
                 class="text-blue-600">
                 Add new schedule
             </x-button>
         </div>
     </div>
     <div class="flex flex-col mt-3">
         <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
             <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                 <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                     <table class="min-w-full divide-y divide-gray-300">
                         <thead class="bg-green-600">
                             <tr>
                                 <th scope="col"
                                     class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">
                                     Date
                                 </th>
                                 </th>
                                 <th scope="col"
                                     class="px-3 py-3.5 text-left text-sm font-semibold text-white">Countdown
                                 </th>
                                 <th scope="col"
                                     class="px-3 py-3.5 text-left text-sm font-semibold text-white">No. of Test Centers
                                 </th>
                                 <th scope="col"
                                     class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                     <span class="sr-only">Edit</span>
                                 </th>
                             </tr>
                         </thead>
                         <tbody class="bg-white">
                             @forelse ($schedules as $schedule)
                                 <tr class="even:bg-gray-100 odd:bg-white">
                                     <td
                                         class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                         <p title="{{ $schedule->date }}"
                                             class="w-64 truncate">
                                             @php
                                                 //    format the shedule time like March 28, 2000 8:00 AM
                                                 $date = Carbon\Carbon::parse($schedule->date);
                                                 $formattedDate = $date->format('F d, Y H:i A');
                                             @endphp
                                             {{ $formattedDate }}
                                         </p>
                                     </td>
                                     <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                         <x-countdown expires="{{ $schedule->date }}" />
                                     </td>
                                     <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                         {{ $schedule->schedule_test_centers_count / 2 }}
                                     </td>
                                     <td
                                         class="relative py-2 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                         <div class="flex justify-end space-x-2">
                                             <x-button wire:click="showOption({{ $schedule->id }})">
                                                 Options
                                             </x-button>
                                         </div>
                                     </td>
                                 </tr>
                             @empty
                                 <tr>
                                     <td colspan="4"
                                         class="py-3 text-center">
                                         <span class="text-gray-500">No record found</span>
                                     </td>
                                 </tr>
                             @endforelse
                         </tbody>
                     </table>
                 </div>
                 {{-- pagination --}}
             </div>
         </div>
     </div>
 </div>
