<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p class="mb-6">{{ __("You're logged in!") }}</p>

                    <div class="flex gap-4">
                        
                        <!-- Company Button -->
                        <a href="{{ route('companies.index') }}"
                           class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Company
                        </a>

                        <!-- Employee Button -->
                        <a href="{{ route('employees.index') }}"
                           class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                            Employee
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>