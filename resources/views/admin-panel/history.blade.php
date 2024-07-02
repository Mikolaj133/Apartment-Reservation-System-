@if(auth()->check() && auth()->user()->is_admin)

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Reservation History') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @if ($history->isEmpty())
                            <p>No reservation history found.</p>
                        @else
                            <table class="min-w-full bg-white dark:bg-gray-800">
                                <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">ID</th>
                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Date From</th>
                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Date To</th>
                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Apartment ID</th>
                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">User ID</th>
                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Deposit</th>
                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($history as $index)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $index->id }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $index->date_from }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $index->date_to }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $index->apartment_id }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $index->user_id }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $index->deposit }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $index->status }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

@else
    <p>Cwaniaku gdzie zagladasz</p>
@endif
