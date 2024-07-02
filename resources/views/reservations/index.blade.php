<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Current Reservations') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Here you can see all your reservations and pay the deposit.") }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @forelse ($reservations as $reservation)
                        <section class="mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">
                            <header>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                    {{ $reservation->apartment->location }}
                                </h3>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    <span class="font-medium">Start:</span> {{ $reservation->date_from }}<br>
                                    <span class="font-medium">End:</span> {{ $reservation->date_to }}<br>
                                    <span class="font-medium">Deposit:</span> {{ $reservation->deposit }}<br>
                                    <span class="font-medium">Status:</span> {{$reservation->status}}
                                </p>
                                <div class="mt-4">
                                    @if($reservation->status === 'pending')
                                        <form method="POST" action="{{ route('profile.deposit') }}" class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="apartment_id" value="{{ $reservation->apartment_id }}">
                                            <input type="hidden" name="deposit" value="{{ $reservation->deposit }}">
                                            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                            <input type="hidden" name="date_from" value="{{ $reservation->date_from }}">
                                            <input type="hidden" name="date_to" value="{{ $reservation->date_to }}">
                                            <x-primary-button class="mr-2">Pay Deposit</x-primary-button>
                                        </form>
                                        <form method="POST" action="{{ route('reservations.destroy', $reservation->id) }}" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="apartment_id" value="{{ $reservation->apartment_id }}">
                                            <input type="hidden" name="deposit" value="{{ $reservation->deposit }}">
                                            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                            <input type="hidden" name="date_from" value="{{ $reservation->date_from }}">
                                            <input type="hidden" name="date_to" value="{{ $reservation->date_to }}">
                                            <x-danger-button>Cancel Reservation</x-danger-button>
                                        </form>
                                    @endif
                                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="ml-2 text-blue-600 hover:text-blue-800">
                                        Edit Reservation
                                    </a>
                                </div>
                            </header>
                        </section>
                    @empty
                        <p class="text-center text-gray-600 dark:text-gray-400">No reservations found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
