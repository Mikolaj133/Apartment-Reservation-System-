@if(auth()->check() && auth()->user()->is_admin)
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Discount Management') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-2xl font-bold mb-6">{{ isset($discount) ? 'Edit Discount' : 'Add Discount' }}</h1>
                        <form action="{{ isset($discount) ? route('discount.update', $discount->id) : route('discount.store') }}" method="POST" class="space-y-6">
                            @csrf
                            @if(isset($discount))
                                @method('PUT')
                            @endif
                            <div>
                                <label for="apartment_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apartment</label>
                                <select name="apartment_id" id="apartment_id" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    @foreach($apartments as $apartment)
                                        <option value="{{ $apartment->id }}" {{ isset($discount) && $discount->apartment_id == $apartment->id ? 'selected' : '' }}>
                                            {{ $apartment->location }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="percentage" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Percentage</label>
                                <input type="number" name="percentage" id="percentage" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ $discount->percentage ?? old('percentage') }}" required>
                            </div>
                            <div>
                                <label for="valid_from" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valid From</label>
                                <input type="date" name="valid_from" id="valid_from" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ $discount->valid_from ?? old('valid_from') }}" required>
                            </div>
                            <div>
                                <label for="valid_to" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valid To</label>
                                <input type="date" name="valid_to" id="valid_to" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ $discount->valid_to ?? old('valid_to') }}" required>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    {{ isset($discount) ? 'Update' : 'Add' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    <p>Access Denied</p>
@endif
