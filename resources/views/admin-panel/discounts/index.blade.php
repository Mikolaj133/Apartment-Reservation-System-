@if(auth()->check() && auth()->user()->is_admin)
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Discount Management') }}
            </h2>
        </x-slot>


        <div class="py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 ">
                        <h1 class="text-2xl font-bold mb-6">Discounts</h1>
                        <a href="{{ route('discount.create') }}" class="btn btn-primary my-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Discount</a>
                        <div class="overflow-x-auto my-8">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Apartment</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Percentage</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Valid From</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Valid To</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                                @foreach($discounts as $discount)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $discount->apartment->location }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $discount->percentage }}%</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $discount->valid_from }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $discount->valid_to }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                            <a href="{{ route('discount.edit', $discount->id) }}" class="btn btn-warning bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Edit</a>
                                            <form action="{{ route('discount.destroy', $discount->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    <p>Access Denied</p>
@endif
