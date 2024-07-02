
@if(auth()->check() && auth()->user()->is_admin)
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit User') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="mt-4">
                                <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Name</label>
                                <input id="name" class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm rounded-md" type="text" name="name" value="{{ $user->name }}" required autofocus />
                            </div>

                            <div class="mt-4">
                                <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Email</label>
                                <input id="email" class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm rounded-md" type="email" name="email" value="{{ $user->email }}" required />
                            </div>

                            <div class="mt-4">
                                <label for="is_admin" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Is Admin</label>
                                <select id="is_admin" name="is_admin" class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm rounded-md">
                                    <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    <p class="text-center text-lg">You are not an admin.</p>
@endif
