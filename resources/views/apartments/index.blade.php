<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Apartments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <style>
                        .form-container {
                            background-color: #2d3748;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                            margin-bottom: 20px;
                        }
                        .form-group {
                            margin-bottom: 16px;
                        }
                        .form-group label {
                            display: block;
                            margin-bottom: 8px;
                            font-size: 14px;
                            color: #f7fafc;
                        }
                        .form-group input {
                            width: 100%;
                            padding: 10px;
                            border: 1px solid #4a5568;
                            border-radius: 4px;
                            background-color: #4a5568;
                            color: #f7fafc;
                        }
                        .form-group input:focus {
                            border-color: #63b3ed;
                            outline: none;
                        }
                        .form-button {
                            display: flex;
                            justify-content: flex-end;
                        }
                        .form-button button {
                            background-color: #4299e1;
                            color: #f7fafc;
                            padding: 10px 20px;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                        }
                        .form-button button:hover {
                            background-color: #3182ce;
                        }
                        .apartment-list {
                            display: grid;
                            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                            gap: 20px;
                        }
                        .apartment-item {
                            background-color: #ffffff;
                            color: #2d3748;
                            border-radius: 8px;
                            overflow: hidden;
                            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                            transition: transform 0.2s;
                        }
                        .apartment-item:hover {
                            transform: translateY(-5px);
                        }
                        .apartment-item img {
                            width: 100%;
                            height: auto;
                        }
                        .apartment-item h3 {
                            font-size: 18px;
                            margin: 16px;
                        }
                        .pagination {
                            display: flex;
                            justify-content: center;
                            margin-top: 20px;
                        }
                    </style>

                    <div class="form-container">
                        <form action="{{ route('apartment.filter') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div class="form-group">
                                <label for="person_quantity">How many people</label>
                                <input type="number" id="person_quantity" name="person_quantity" min="1" max="10">
                            </div>

                            <div class="form-group">
                                <label for="floor">Floor</label>
                                <input type="number" id="floor" name="floor" min="1" max="10">
                            </div>

                            <div class="form-group">
                                <label for="rooms">How many rooms</label>
                                <input type="number" id="rooms" name="rooms" min="1" max="10">
                            </div>

                            <div class="form-button">
                                <button type="submit">Filter</button>
                            </div>
                        </form>
                    </div>

                    {{-- Apartments List --}}
                    <div class="apartment-list">
                        @foreach($apartments as $apartment)
                            <div class="apartment-item">
                                <a href="/apartments/{{$apartment['id']}}">
                                    <img src="{{$apartment->picture}}" alt="{{ $apartment['location'] }}">
                                    <h3>{{ $apartment['location'] }}</h3>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="pagination">
                        {{ $apartments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
