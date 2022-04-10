<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Payments</h1>
            <p class="mt-2 text-sm text-gray-700">
                All listed are payments to review.
            </p>
        </div>
    </div>
    <div class="flex flex-col mt-8">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-green-600">
                            <tr>
                                <th scope="col"
                                    class="py-3 pl-4 pr-3 text-xs font-medium tracking-wide text-left text-white uppercase sm:pl-6">
                                    Applicant Name
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wide text-left text-white uppercase">
                                    Applicant Type
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wide text-left text-white uppercase">
                                    Payment Submitted
                                </th>
                                <th scope="col"
                                    class="relative py-3 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($payments as $payment)
                                <tr>
                                    <td
                                        class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                        @if ($payment->user->applicant_type == 'Freshmen')
                                            {{ $payment->user->freshmenApplication->first_name }}
                                            {{ $payment->user->freshmenApplication->middle_name }}
                                            {{ $payment->user->freshmenApplication->last_name }}
                                        @elseif ($payment->user->applicant_type == 'Transferee')
                                            {{ $payment->user->transfereeApplication->first_name }}
                                            {{ $payment->user->transfereeApplication->middle_name }}
                                            {{ $payment->user->transfereeApplication->last_name }}
                                        @endif
                                    </td>
                                    <td
                                        class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                        <span class="uppercase"> {{ $payment->application_type }}</span>
                                    </td>
                                    <td
                                        class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                        <span class="uppercase">
                                            {{ $payment->created_at->format('F j, Y g:i A') }}
                                        </span>
                                    </td>
                                    <td
                                        class="relative py-4 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                        <x-button wire:click="showOption({{ $payment->id }})"
                                            gray>
                                            Option
                                        </x-button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"
                                        class="p-4 text-center text-gray-500">
                                        No payments found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="my-2">
                    {{ $payments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
