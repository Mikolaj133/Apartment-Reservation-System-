{{--@if(auth()->check() && auth()->user()->is_admin)--}}

{{--    <x-app-layout>--}}
{{--        <x-slot name="header">--}}
{{--            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--                {{ __('Reservation Management') }}--}}
{{--            </h2>--}}
{{--        </x-slot>--}}

{{--        <div class="py-12">--}}
{{--            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                    <div class="p-6 text-gray-900 dark:text-gray-100">--}}
{{--                        @if ($reservation->isEmpty())--}}
{{--                            <p>No reservation found.</p>--}}
{{--                        @else--}}
{{--                            <table class="min-w-full bg-white dark:bg-gray-800">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">ID</th>--}}
{{--                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Date From</th>--}}
{{--                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Date To</th>--}}
{{--                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Apartment ID</th>--}}
{{--                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">User ID</th>--}}
{{--                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Deposit</th>--}}
{{--                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Status</th>--}}
{{--                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Action</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach ($reservation as $index)--}}
{{--                                    <tr>--}}
{{--                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $index->id }}</td>--}}
{{--                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $index->date_from }}</td>--}}
{{--                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $index->date_to }}</td>--}}
{{--                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $index->apartment_id }}</td>--}}
{{--                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $index->user_id }}</td>--}}
{{--                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $index->deposit }}</td>--}}
{{--                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $index->status }}</td>--}}

{{--                                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">--}}
{{--                                            <a href="{{ route('admin.reservation.edit', $index->id) }}" class="text-blue-600">Edit</a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </x-app-layout>--}}

{{--@else--}}
{{--    <p>Cwaniaku gdzie zagladasz</p>--}}
{{--@endif--}}


@if(auth()->check() && auth()->user()->is_admin)
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Reservation Management') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @if ($reservation->isEmpty())
                            <p class="text-center">No reservation found.</p>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">ID</th>
                                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date From</th>
                                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date To</th>
                                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Apartment ID</th>
                                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">User ID</th>
                                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Deposit</th>
                                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($reservation as $index)
                                        <tr>
                                            <td class="py-2 px-6 whitespace-nowrap">{{ $index->id }}</td>
                                            <td class="py-2 px-6 whitespace-nowrap">{{ $index->date_from }}</td>
                                            <td class="py-2 px-6 whitespace-nowrap">{{ $index->date_to }}</td>
                                            <td class="py-2 px-6 whitespace-nowrap">{{ $index->apartment_id }}</td>
                                            <td class="py-2 px-6 whitespace-nowrap">{{ $index->user_id }}</td>
                                            <td class="py-2 px-6 whitespace-nowrap">{{ $index->deposit }}</td>
                                            <td class="py-2 px-6 whitespace-nowrap">{{ $index->status }}</td>
                                            <td class="py-2 px-6 whitespace-nowrap">
                                                <a href="{{ route('admin.reservation.edit', $index->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    <p>You are not authorized to view this page.</p>
@endif
