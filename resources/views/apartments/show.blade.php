{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            {{ __('Apartment') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}
{{--                    <div class="flex flex-col md:flex-row items-center md:items-start">--}}
{{--                        <div class="md:w-1/2">--}}
{{--                            <img class="rounded-lg shadow-lg" src="{{ $apartment['picture'] }}" alt="Apartment Image">--}}
{{--                        </div>--}}
{{--                        <div class="md:w-1/2 md:ml-6 mt-6 md:mt-0">--}}
{{--                            <h2 class="font-bold text-2xl mb-2">{{ $apartment->location }}</h2>--}}
{{--                            <p class="mb-4 text-gray-600 dark:text-gray-400">--}}
{{--                                This apartment is for {{ $apartment['number_of_persons'] }} persons.--}}
{{--                            </p>--}}
{{--                            <p class="mb-4 text-gray-600 dark:text-gray-400">--}}
{{--                                Price: ${{ $apartment['price_per_night'] }} per night--}}
{{--                            </p>--}}

{{--                            <form id="reservation-form" action="{{ route('reservations.store') }}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <h3 class="font-semibold text-lg mb-2">Reservation</h3>--}}
{{--                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">--}}
{{--                                <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">--}}
{{--                                <input type="hidden" name="price" id="price" value="">--}}

{{--                                <div class="mb-4">--}}
{{--                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="date_from">Start</label>--}}
{{--                                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" type="date" name="date_from" id="date_from" required>--}}
{{--                                </div>--}}

{{--                                <div class="mb-4">--}}
{{--                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="date_to">End</label>--}}
{{--                                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" type="date" name="date_to" id="date_to" required>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="mt-8" id='calendar'></div>--}}

{{--                    <!-- Modal -->--}}
{{--                    <div id="reservationModal" class="fixed z-10 inset-0 overflow-y-auto hidden">--}}
{{--                        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">--}}
{{--                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">--}}
{{--                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>--}}
{{--                            </div>--}}
{{--                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>--}}
{{--                            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">--}}
{{--                                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">--}}
{{--                                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100" id="modal-title">--}}
{{--                                        Confirm Reservation--}}
{{--                                    </h3>--}}
{{--                                    <div class="mt-2">--}}
{{--                                        <p class="text-sm text-gray-500 dark:text-gray-400">--}}
{{--                                            Apartment: <span id="modal-apartment-location">{{ $apartment->location }}</span>--}}
{{--                                        </p>--}}
{{--                                        <p class="text-sm text-gray-500 dark:text-gray-400">--}}
{{--                                            Start Date: <span id="modal-start-date"></span>--}}
{{--                                        </p>--}}
{{--                                        <p class="text-sm text-gray-500 dark:text-gray-400">--}}
{{--                                            End Date: <span id="modal-end-date"></span>--}}
{{--                                        </p>--}}
{{--                                        <p class="text-sm text-gray-500 dark:text-gray-400">--}}
{{--                                            Price: <span id="modal-price"></span>--}}
{{--                                        </p>--}}
{{--                                        <p class="mt-4">--}}
{{--                                            Deposit needs to be paid in the next 24h.--}}
{{--                                            After that reservation will be canceled.--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">--}}
{{--                                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm" onclick="submitReservation()">--}}
{{--                                        Confirm--}}
{{--                                    </button>--}}
{{--                                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-600 dark:text-gray-100 text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal()">--}}
{{--                                        Cancel--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    @push('scripts')--}}
{{--                        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js'></script>--}}
{{--                        <script>--}}
{{--                            document.addEventListener('DOMContentLoaded', function() {--}}
{{--                                var calendarEl = document.getElementById('calendar');--}}
{{--                                var calendar = new FullCalendar.Calendar(calendarEl, {--}}
{{--                                    initialView: 'dayGridMonth',--}}
{{--                                    selectable: true,--}}
{{--                                    select: function(info) {--}}
{{--                                        // Update the form fields with the selected dates--}}
{{--                                        document.getElementById('date_from').value = info.startStr;--}}
{{--                                        document.getElementById('date_to').value = info.endStr;--}}

{{--                                        // Calculate the price--}}
{{--                                        const price = calculatePrice(info.startStr, info.endStr, {{ $apartment['price_per_night'] }});--}}
{{--                                        document.getElementById('price').value = price;--}}

{{--                                        // Update the modal with reservation details--}}
{{--                                        document.getElementById('modal-start-date').innerText = info.startStr;--}}
{{--                                        document.getElementById('modal-end-date').innerText = info.endStr;--}}
{{--                                        document.getElementById('modal-price').innerText = price;--}}

{{--                                        // Show the modal--}}
{{--                                        document.getElementById('reservationModal').classList.remove('hidden');--}}
{{--                                    },--}}
{{--                                    events: '/apartments/{{ $apartment->id }}/availability',--}}
{{--                                    eventBackgroundColor: '#FF0000', // Ensure background color is applied--}}
{{--                                    eventDisplay: 'background', // Ensures events are displayed as background--}}
{{--                                    eventDidMount: function(info) {--}}
{{--                                        // Apply red background color to taken dates--}}
{{--                                        if (info.event.extendedProps.rendering === 'background') {--}}
{{--                                            info.el.style.backgroundColor = info.event.backgroundColor;--}}
{{--                                        }--}}
{{--                                    },--}}
{{--                                });--}}
{{--                                calendar.render();--}}
{{--                            });--}}

{{--                            function calculatePrice(startDate, endDate, pricePerNight) {--}}
{{--                                const start = new Date(startDate);--}}
{{--                                const end = new Date(endDate);--}}
{{--                                const diffTime = Math.abs(end - start);--}}
{{--                                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));--}}
{{--                                return diffDays * pricePerNight;--}}
{{--                            }--}}

{{--                            function closeModal() {--}}
{{--                                document.getElementById('reservationModal').classList.add('hidden');--}}
{{--                            }--}}

{{--                            function submitReservation() {--}}
{{--                                document.getElementById('reservation-form').submit();--}}
{{--                            }--}}
{{--                        </script>--}}
{{--                    @endpush--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}




<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Apartment') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" id="apartment-view">


                    <div class="flex flex-col md:flex-row items-center md:items-start">
                        <div class="md:w-1/2" id="apartment-image">
                            <img class="rounded-lg shadow-lg" src="{{ $apartment['picture'] }}" alt="Apartment Image">
                        </div>
                        <div class="md:w-1/2 md:ml-6 mt-6 md:mt-0" id="apartment-details">
                            <h2 class="font-bold text-2xl mb-2" id="apartment-location">{{ $apartment->location }}</h2>

                            <p class="mb-4 text-gray-600 dark:text-gray-400" id="apartment-persons">
                                This apartment is for <span class="font-semibold">{{ $apartment['number_of_persons'] }}</span> persons.
                            </p>

                            <p class="mb-4 text-gray-600 dark:text-gray-400" id="apartment-price">
                                Price: $<span class="font-semibold">{{ $apartment['price_per_night'] }}</span> per night
                            </p>

                            <p class="mb-4 text-gray-600 dark:text-gray-400" id="apartment-persons">
                                This apartment has <span class="font-semibold">{{ $apartment['square_feet'] }}</span> square feet.
                            </p>

                            <p class="mb-4 text-gray-600 dark:text-gray-400" id="apartment-persons">
                                Apartment is loacted at  <span class="font-semibold">{{ $apartment['floor'] }}</span> floor.
                            </p>



{{--                            <form id="reservation-form" action="{{ route('reservations.store') }}" method="POST" class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">--}}
{{--                                @csrf--}}
{{--                                <h3 class="font-semibold text-lg mb-2" id="reservation-title">Reservation</h3>--}}
{{--                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">--}}
{{--                                <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">--}}
{{--                                <input type="hidden" name="price" id="price" value="">--}}

{{--                                <div class="mb-4">--}}
{{--                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="date_from">Start</label>--}}
{{--                                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" type="date" name="date_from" id="date_from" required>--}}
{{--                                </div>--}}

{{--                                <div class="mb-4">--}}
{{--                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="date_to">End</label>--}}
{{--                                    <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" type="date" name="date_to" id="date_to" required>--}}
{{--                                </div>--}}

{{--                                <div class="flex justify-end">--}}
{{--                                    <button type="button" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" onclick="submitReservation()">--}}
{{--                                        Confirm--}}
{{--                                    </button>--}}
{{--                                </div>--}}


                            <form id="reservation-form" action="{{ route('reservations.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">
                                <input type="hidden" name="price" id="price" value="">
                                <input type="hidden" type="date" name="date_from" id="date_from" required>
                                <input type="hidden" type="date" name="date_to" id="date_to" required>
                            </form>
                        </div>
                    </div>

                    <div class="mt-8" id='calendar'></div>

                    <!-- Modal -->
                    <div id="reservationModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100" id="modal-title">
                                        Confirm Reservation
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Apartment: <span id="modal-apartment-location">{{ $apartment->location }}</span>
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Start Date: <span id="modal-start-date"></span>
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            End Date: <span id="modal-end-date"></span>
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Price: <span id="modal-price"></span>
                                        </p>
                                        <p class="mt-4">
                                            Deposit needs to be paid in the next 24h.
                                            After that reservation will be canceled.
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm" onclick="submitReservation()">
                                        Confirm
                                    </button>
                                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-600 dark:text-gray-100 text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal()">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @push('scripts')
                        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js'></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var calendarEl = document.getElementById('calendar');
                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    initialView: 'dayGridMonth',
                                    selectable: true,
                                    select: function(info) {
                                        // Update the form fields with the selected dates
                                        document.getElementById('date_from').value = info.startStr;
                                        document.getElementById('date_to').value = info.endStr;

                                        // Calculate the price
                                        const price = calculatePrice(info.startStr, info.endStr, {{ $apartment['price_per_night'] }});
                                        document.getElementById('price').value = price;

                                        // Update the modal with reservation details
                                        document.getElementById('modal-start-date').innerText = info.startStr;
                                        document.getElementById('modal-end-date').innerText = info.endStr;
                                        document.getElementById('modal-price').innerText = price;

                                        // Show the modal
                                        document.getElementById('reservationModal').classList.remove('hidden');
                                    },
                                    events: '/apartments/{{ $apartment->id }}/availability',
                                    eventBackgroundColor: '#FF0000', // Ensure background color is applied
                                    eventDisplay: 'background', // Ensures events are displayed as background
                                    eventDidMount: function(info) {
                                        // Apply red background color to taken dates
                                        if (info.event.extendedProps.rendering === 'background') {
                                            info.el.style.backgroundColor = info.event.backgroundColor;
                                        }
                                    },
                                });
                                calendar.render();
                            });

                            function calculatePrice(startDate, endDate, pricePerNight) {
                                const start = new Date(startDate);
                                const end = new Date(endDate);
                                const diffTime = Math.abs(end - start);
                                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                                return diffDays * pricePerNight;
                            }

                            function closeModal() {
                                document.getElementById('reservationModal').classList.add('hidden');
                            }

                            function submitReservation() {
                                document.getElementById('reservation-form').submit();
                            }
                        </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




