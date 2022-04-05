 @props(['link', 'label', 'active'])

 <a href="{{ $link }}"
     class="{{ $active ? 'shadow border' : 'bg-white text-gray-600 hover:bg-green-600 hover:text-white' }}  group  flex items-center px-2 py-2  font-medium rounded-md focus:outline-none focus:border-0">
     {{ $slot }}
     <span class="mt-1"> {{ $label }}</span>
 </a>
