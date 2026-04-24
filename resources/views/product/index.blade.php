<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Tombol tambah product hanya admin -->
                @if(Auth::user()->role === 'admin')
                    <div class="mb-4">
                        <a href="{{ route('product.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded">
                            Tambah Product
                        </a>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 text-black">
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Nama</th>
                                <th class="border px-4 py-2">Kategori</th>
                                <th class="border px-4 py-2">Qty</th>
                                <th class="border px-4 py-2">Price</th>
                                <th class="border px-4 py-2">User</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $index => $product)
                                <tr>
                                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $product->name }}</td>
                                    <td class="border px-4 py-2">{{ $product->category->name ?? '-' }}</td>
                                    <td class="border px-4 py-2">{{ $product->qty }}</td>
                                    <td class="border px-4 py-2">{{ $product->price }}</td>
                                    <td class="border px-4 py-2">{{ $product->user->name ?? '-' }}</td>
                                    <td class="border px-4 py-2 space-x-2">
                                        <!-- Semua user login bisa view -->
                                        <a href="{{ route('product.show', $product->id) }}" class="text-blue-600">
                                            View
                                        </a>

                                        <!-- Edit dan delete hanya admin -->
                                        @if(Auth::user()->role === 'admin')
                                            @can('update', $product)
                                                <a href="{{ route('product.edit', $product->id) }}" class="text-yellow-600">
                                                    Edit
                                                </a>
                                            @endcan

                                            @can('delete', $product)
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Yakin hapus data?')" class="text-red-600">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endcan
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="border px-4 py-2 text-center">
                                        Belum ada data product
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>