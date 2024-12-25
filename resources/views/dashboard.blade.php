<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex max-w-9xl mx-auto sm:px-6 lg:px-8">
            <!-- Sidebar -->
            <div class="w-1/4 bg-gray-100 shadow-lg rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-700 mb-6">Navigation</h3>
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('dashboard') }}"
                            class="text-gray-800 hover:text-blue-600 focus:outline-none transition duration-300 ease-in-out no-underline">Dashboard</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('transactions.products') }}"
                            class="text-gray-800 hover:text-blue-600 focus:outline-none transition duration-300 ease-in-out no-underline">Product</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('transactions.index') }}"
                            class="text-gray-800 hover:text-blue-600 focus:outline-none transition duration-300 ease-in-out no-underline">Transaction</a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="w-3/4 bg-white shadow-lg rounded-lg ml-8 p-6">
                <div class="text-gray-900 mb-6">
                    {{ __("You're logged in!") }}
                </div>

                <!-- Button Section (Card Selection) -->
                <div class="grid grid-cols-2 gap-8">
                    <!-- Product Card -->
                    <div
                        class="bg-blue-100 rounded-lg shadow-md p-6 text-center hover:bg-blue-200 transition duration-300 ease-in-out">
                        <a href="{{ route('transactions.products') }}"
                            class="text-xl font-semibold text-blue-600 hover:text-blue-800 focus:outline-none no-underline">
                            Show Table Product
                        </a>
                        {{-- <p class="mt-4 text-lg font-medium text-blue-700">{{ $productCount }} Products</p> --}}
                    </div>
                    <!-- Transaction Card -->
                    <div
                        class="bg-green-100 rounded-lg shadow-md p-6 text-center hover:bg-green-200 transition duration-300 ease-in-out">
                        <a href="{{ route('transactions.index') }}"
                            class="text-xl font-semibold text-green-600 hover:text-green-800 focus:outline-none no-underline">
                            Show Table Transaction
                        </a>
                        {{-- <p class="mt-4 text-lg font-medium text-green-700">{{ $transactionCount }} Transactions</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
