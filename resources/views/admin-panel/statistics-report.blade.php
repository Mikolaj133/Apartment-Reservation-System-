<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Generate Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Report Generation Form --}}
                    <form action="{{ route('statistics.report') }}" method="GET" class="mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <label for="date_from" class="block text-sm font-medium text-gray-700 dark:text-gray-300">From Date</label>
                            <input type="date" id="date_from" name="date_from" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div>
                            <label for="date_to" class="block text-sm font-medium text-gray-700 dark:text-gray-300">To Date</label>
                            <input type="date" id="date_to" name="date_to" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="flex items-end">
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Generate Report
                            </button>
                        </div>
                    </form>

                    {{-- Display the report --}}
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold">Report from {{ $startDate }} to {{ $endDate }}</h3>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Statistic</th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Value</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Users Created During Period</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $totalUsersDuringPeriod }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100 cursor-pointer" onclick="toggleDetails('reviews')">Total Reviews</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $totalReviews }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Average Rating</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $avgRating }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100 cursor-pointer" onclick="toggleDetails('reservations')">Total Reservations</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $totalReservations }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100 cursor-pointer" onclick="toggleDetails('apartments')">Total Apartments</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $totalApartments }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100 cursor-pointer" onclick="toggleDetails('users')">Total Earnings</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $totalEarnings }}</td>
                            </tr>
                            </tbody>
                        </table>

                        {{-- Include sections to display the detailed data --}}
                        <div class="mt-6" id="reviews">
                            <h4 class="font-medium">Reviews:</h4>
                            @foreach($reviews as $review)
                                <p>User: {{ $review->user_id }}, Rating: {{ $review->rating }}, Comment: {{ $review->review }}, Date: {{ $review->created_at }}</p>
                            @endforeach
                        </div>
                        <div class="mt-6 hidden" id="reservations">
                            <h4 class="font-medium">Reservations:</h4>
                            @foreach($reservations as $reservation)
                                <p>Apartment: {{ $reservation->apartment->location }}, User: {{ $reservation->user->name }}, Date From: {{ $reservation->date_from }}, Date To: {{ $reservation->date_to }}, Status: {{ $reservation->status }}</p>
                            @endforeach
                        </div>
                        <div class="mt-6 hidden" id="apartments">
                            <h4 class="font-medium">Apartments:</h4>
                            @foreach($apartments as $apartment)
                                <p>Location: {{ $apartment->location }}, Created At: {{ $apartment->created_at }}</p>
                            @endforeach
                        </div>
                        <div class="mt-6 hidden" id="users">
                            <h4 class="font-medium">Users:</h4>
                            @foreach($users as $user)
                                <p>Name: {{ $user->name }}, Email: {{ $user->email }}, Created At: {{ $user->created_at }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function toggleDetails(sectionId) {
        const section = document.getElementById(sectionId);
        if (section.classList.contains('hidden')) {
            section.classList.remove('hidden');
        } else {
            section.classList.add('hidden');
        }
    }
</script>
