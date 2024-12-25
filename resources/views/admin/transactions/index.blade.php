<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex max-w-9xl mx-auto sm:px-6 lg:px-8">
            <!-- Sidebar -->
            <aside class="w-1/4 bg-gray-100 shadow-lg rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-700 mb-6">Navigation</h3>
                <nav>
                    <ul>
                        <li class="mb-4">
                            <a href="{{ route('dashboard-admin') }}"
                                class="text-gray-800 hover:text-blue-600 focus:outline-none transition duration-300 ease-in-out no-underline">
                                Dashboard
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('admin.products.index') }}"
                                class="text-gray-800 hover:text-blue-600 focus:outline-none transition duration-300 ease-in-out no-underline">
                                Product
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('admin.transactions.index') }}"
                                class="text-gray-800 hover:text-blue-600 focus:outline-none transition duration-300 ease-in-out no-underline">
                                Transaction
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="w-3/4 bg-white shadow-lg rounded-lg ml-8 p-6">
                <div class="py-5">
                    <h2 class="text-center text-xl font-semibold mb-4">Transaction List</h2>
                    <a href="{{ route('admin.transactions.create') }}" class="btn btn-primary mb-3">Add Transaction</a>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2">ID Transaction</th>
                                <th class="px-4 py-2">Date</th>
                                <th class="px-4 py-2">Product</th>
                                <th class="px-4 py-2">Price/Product</th>
                                <th class="px-4 py-2">Amount</th>
                                <th class="px-4 py-2">Total Price</th>
                                <th class="px-4 py-2">Actions</th>
                                <th class="px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <td class="px-4 py-2">TRX00{{ $transaction->id }}</td>
                                    <td class="px-4 py-2">{{ $transaction->date }}</td>
                                    <td class="px-4 py-2">{{ $transaction->product->name }} <br>
                                        PRD00{{ $transaction->product->id }}</td>
                                    <td class="px-4 py-2">
                                        Rp.{{ number_format($transaction->product->price, 0, ',', '.') }}</td>
                                    <td class="px-4 py-2">{{ $transaction->amount }}</td>
                                    <td class="px-4 py-2">
                                        Rp.{{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('admin.transactions.edit', $transaction) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.transactions.destroy', $transaction) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                    <td class="px-4 py-2">
                                        @if ($transaction->status == 'pending')
                                            <form action="{{ route('admin.transactions.approve', $transaction) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success">Approve</button>
                                            </form>
                                            <form action="{{ route('admin.transactions.reject', $transaction) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-danger">Reject</button>
                                            </form>
                                        @elseif ($transaction->status == 'approved')
                                            <span class="text-green-500">Approved</span>
                                        @elseif ($transaction->status == 'rejected')
                                            <span class="text-red-500">Rejected</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center text-gray-500 py-4">No transactions found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
