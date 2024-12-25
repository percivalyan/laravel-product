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
                    <h2 class="mb-4 text-center">Add Transaction</h2>

                    <form action="{{ route('admin.transactions.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>

                        <div class="mb-3">
                            <label for="product_id" class="form-label">Product</label>
                            <select class="form-control" id="product_id" name="product_id" required>
                                <option value="">Select a product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }} - Rp{{ $product->price }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>

                        <div class="mb-3">
                            <label for="total_price" class="form-label">Total Price</label>
                            <input type="text" class="form-control bg-gray-100" id="total_price" name="total_price"
                                readonly>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productSelect = document.getElementById('product_id');
            const amountInput = document.getElementById('amount');
            const totalPriceInput = document.getElementById('total_price');

            // Simpan data harga produk
            const productPrices = @json($products->pluck('price', 'id'));

            // Fungsi untuk menghitung total harga
            function calculateTotalPrice() {
                const productId = productSelect.value;
                const amount = parseInt(amountInput.value) || 0;
                const price = productPrices[productId] || 0;

                totalPriceInput.value = (amount * price).toFixed(2); // Format ke 2 desimal
            }

            // Event listener untuk perubahan pada dropdown dan jumlah
            productSelect.addEventListener('change', calculateTotalPrice);
            amountInput.addEventListener('input', calculateTotalPrice);
        });
    </script>

</x-app-layout>
