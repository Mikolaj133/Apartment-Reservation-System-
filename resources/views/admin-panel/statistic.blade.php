{{--@if(auth()->check() && auth()->user()->is_admin)--}}
{{--    <x-app-layout>--}}
{{--        <x-slot name="header">--}}
{{--            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--                {{ __('Statistics') }}--}}
{{--            </h2>--}}
{{--        </x-slot>--}}

{{--        <div class="py-12">--}}
{{--            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                    <div class="p-6 text-gray-900 dark:text-gray-100">--}}
{{--                       <form>--}}
{{--                           <x-button>Generate Raport</x-button>--}}
{{--                       </form>--}}

{{--                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">--}}
{{--                            {{ __("Total Reservations: ") . $allTimeReservations }}--}}
{{--                            <br>--}}
{{--                            {{ __("Total Canceled Reservations: ") . $canceledReservations }}--}}
{{--                            <br>--}}
{{--                            {{ __("Most Popular Apartemnt: ") . $mostPopularApartment }}--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </x-app-layout>--}}
{{--@else--}}
{{--    <p>Tys nie admin glupcze</p>--}}
{{--    I think i shoul add here redirection to dashbord view--}}
{{--@endif--}}




{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            {{ __('Statistics') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}
{{--                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Statistics</h3>--}}

{{--                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">--}}
{{--                        {{ __("Total Reservations: ") . $allTimeReservations }}<br>--}}
{{--                        {{ __("Total Canceled Reservations: ") . $canceledReservations }}<br>--}}
{{--                        {{ __("Most Popular Apartment: ") . ($mostPopularApartment ? "ID " . $mostPopularApartment . " (" . $mostPopularApartment->total_reservations . " reservations)" : "N/A") }}--}}
{{--                    </p>--}}

{{--                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">--}}
{{--                        {{ __("Total Reservations: ") . $allTimeReservations }}<br>--}}
{{--                        {{ __("Total Canceled Reservations: ") . $canceledReservations }}<br>--}}
{{--                        {{ __("Most Popular Apartment: ") . ($mostPopularApartment ? "ID " . $mostPopularApartment->apartment_id . " (" . $mostPopularApartment->total_reservations . " reservations)" : "N/A") }}<br>--}}
{{--                        {{ __("Earnings from the beginning ") . $allTimeEarnings . ('$')}}<br>--}}
{{--                    </p>--}}

{{--                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 mt-4">{{ __('Monthly Earnings') }}</h3>--}}
{{--                    <table class="min-w-full bg-white dark:bg-gray-800 mt-2">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Month</th>--}}
{{--                            <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Year</th>--}}
{{--                            <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Earnings ($)</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach ($monthlyEarnings as $earning)--}}
{{--                            <tr>--}}
{{--                                <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $earning->month }}</td>--}}
{{--                                <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $earning->year }}</td>--}}
{{--                                <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ number_format($earning->total_earnings, 2) }}</td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}

{{--                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 mt-4">{{ __('Yearly Earnings') }}</h3>--}}
{{--                    <table class="min-w-full bg-white dark:bg-gray-800 mt-2">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Year</th>--}}
{{--                            <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Earnings ($)</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach ($yearlyEarnings as $earning)--}}
{{--                            <tr>--}}
{{--                                <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $earning->year }}</td>--}}
{{--                                <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ number_format($earning->total_earnings, 2) }}</td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}
{{--                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Generate Report</h3>--}}

{{--                    <form action="{{ route('statistics.report') }}" method="POST">--}}
{{--                        @csrf--}}
{{--                        <div class="mb-4">--}}
{{--                            <label for="date_from" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>--}}
{{--                            <input type="date" id="date_from" name="date_from" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-300">--}}
{{--                        </div>--}}

{{--                        <div class="mb-4">--}}
{{--                            <label for="date_to" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>--}}
{{--                            <input type="date" id="date_to" name="date_to" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-300">--}}
{{--                        </div>--}}

{{--                        <button type="submit" class="bg-blue-500 hoverb:g-blue-700 text-white font-bold py-2 px-4 rounded">--}}
{{--                            Generate Report--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Statistics') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    <!-- Statistics Section -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Statistics</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Total Reservations: ") . $allTimeReservations }}<br>
                            {{ __("Total Canceled Reservations: ") . $canceledReservations }}<br>
                            {{ __("Most Popular Apartment: ") . ($mostPopularApartment ? "ID " . $mostPopularApartment->apartment_id . " (" . $mostPopularApartment->total_reservations . " reservations)" : "N/A") }}<br>
                            {{ __("Earnings from the beginning ") . $allTimeEarnings . ('$')}}<br>
                        </p>

                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 mt-4">{{ __('Monthly Earnings') }}</h3>
                        <table class="min-w-full bg-white dark:bg-gray-800 mt-2">
                            <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Month</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Year</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Earnings ($)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($monthlyEarnings as $earning)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $earning->month }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $earning->year }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ number_format($earning->total_earnings, 2) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 mt-4">{{ __('Yearly Earnings') }}</h3>
                        <table class="min-w-full bg-white dark:bg-gray-800 mt-2">
                            <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Year</th>
                                <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Earnings ($)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($yearlyEarnings as $earning)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $earning->year }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ number_format($earning->total_earnings, 2) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Report Generation Section -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Generate Report</h3>
                        <form action="{{ route('statistics.report') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="date_from" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                                <input type="date" id="date_from" name="date_from" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-300">
                            </div>
                            <div class="mb-4">
                                <label for="date_to" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>
                                <input type="date" id="date_to" name="date_to" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-300">
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Generate Report
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
