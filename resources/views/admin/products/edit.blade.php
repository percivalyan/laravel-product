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
                    <h2 class="mb-4 text-center">Edit Product</h2>
                    <form action="{{ route('admin.products.update', $product) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category" value="{{ $product->category }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
