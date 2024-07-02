<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('Average Rating') }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            {{ number_format($averageRating, 2) }}
                        </p>
                        <a href="{{ url('/rate') }}" class="btn">Rate Our Service</a>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('Available Discounts') }}</h3>
                        <div class="grid gap-6 mt-4 sm:grid-cols-2 lg:grid-cols-3">
                            @forelse($availableDiscounts as $discount)
                                <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow-md">
                                    @if ($discount->apartment)
                                        <img src="{{ $discount->apartment->picture }}" alt="Apartment" class="w-full h-40 object-cover rounded-md mb-4">
                                        <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">
                                            {{ __("Apartment Address: ") . $discount->apartment->location }}
                                        </h4>
                                    @endif
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                        {{ $discount->percentage }}% off
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                        {{ __('Original Price: ') . $discount->apartment->original_price }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                        {{ __('Discount Price: ') . $discount->apartment->price_per_night }}
                                    </p>
                                </div>
                            @empty
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __("No discounts available at the moment.") }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
