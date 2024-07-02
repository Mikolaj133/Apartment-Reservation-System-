@if(auth()->check() && auth()->user()->is_admin)
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Account Management') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @if($users->isEmpty())
                            <p class="text-center text-lg">No accounts in the database.</p>
                        @else
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Saldo</th>
                                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Is Admin</th>
                                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($users as $user)
                                    <tr>
                                        <td class="py-4 px-6 whitespace-nowrap">{{ $user->id }}</td>
                                        <td class="py-4 px-6 whitespace-nowrap">{{ $user->name }}</td>
                                        <td class="py-4 px-6 whitespace-nowrap">{{ $user->email }}</td>
                                        <td class="py-4 px-6 whitespace-nowrap">{{ $user->saldo }}</td>
                                        <td class="py-4 px-6 whitespace-nowrap">{{ $user->isAdmin ? 'Yes' : 'No' }}</td>
                                        <td class="py-4 px-6 whitespace-nowrap">
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    <p>You are not an admin.</p>
@endif

