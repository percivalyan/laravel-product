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
                    <h2 class="text-center text-xl font-semibold mb-4">Product List</h2>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add Product</a>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2">ID Product</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Category</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="px-4 py-2">PRD00{{ $product->id }}</td>
                                    <td class="px-4 py-2">{{ $product->name }}</td>
                                    <td class="px-4 py-2">Rp.{{ $product->price }}</td>
                                    <td class="px-4 py-2">{{ $product->category }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('admin.products.edit', $product) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-gray-500 py-4">No products found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
