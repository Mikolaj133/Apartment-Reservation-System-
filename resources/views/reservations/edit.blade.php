<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Edit Reservation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="date_from" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                            <input type="date" id="date_from" name="date_from" value="{{ old('date_from', $reservation->date_from) }}" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-300">
                        </div>

                        <div class="mb-4">
                            <label for="date_to" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>
                            <input type="date" id="date_to" name="date_to" value="{{ old('date_to', $reservation->date_to) }}" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-300">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800">
                                Update Reservation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
