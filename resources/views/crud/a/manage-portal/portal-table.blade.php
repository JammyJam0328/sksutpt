 <div>
     <div class="sm:flex sm:items-center">
         <div class="sm:flex-auto">
             <h1 class="text-xl font-semibold ">List of Portals</h1>
         </div>
         <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

             <x-button wire:click="$set('createPortalModal', true)"
                 icon="plus"
                 class="text-blue-600">
                 Add new portal
             </x-button>


         </div>
     </div>
     <div class="mt-3 flex flex-col">
         <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
             <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                 <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                     <table class="min-w-full divide-y divide-gray-300">
                         <thead class="bg-green-600">
                             <tr>
                                 <th scope="col"
                                     class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">
                                     Title
                                 </th>
                                 <th scope="col"
                                     class="px-3 py-3.5 text-left text-sm font-semibold text-white">School Year</th>
                                 <th scope="col"
                                     class="px-3 py-3.5 text-left text-sm font-semibold text-white">Status</th>

                                 <th scope="col"
                                     class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                     <span class="sr-only">Edit</span>
                                 </th>
                             </tr>
                         </thead>
                         <tbody class="bg-white">
                             @forelse ($portals as $portal)
                                 <tr class="even:bg-gray-100 odd:bg-white">
                                     <td
                                         class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                         <p title="{{ $portal->title }}"
                                             class="w-64 truncate"> {{ $portal->title }}</p>
                                     </td>
                                     <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                         {{ $portal->school_year }}
                                     </td>
                                     <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                         @if ($portal->status)
                                             <span
                                                 class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                 Open </span>
                                         @else
                                             <span
                                                 class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                 Close </span>
                                         @endif

                                     </td>
                                     <td
                                         class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                         <div class="flex space-x-2 justify-end">
                                             <x-button wire:click="showOption({{ $portal->id }})">
                                                 Options
                                             </x-button>
                                         </div>
                                     </td>
                                 </tr>
                             @empty
                                 <tr>
                                     <td colspan="4"
                                         class="text-center py-3">
                                         <span class="text-gray-500">No record found</span>
                                     </td>
                                 </tr>
                             @endforelse
                         </tbody>
                     </table>
                 </div>
                 <x-pagination>
                     {{ $portals->links() }}
                 </x-pagination>
             </div>
         </div>
     </div>
 </div>
