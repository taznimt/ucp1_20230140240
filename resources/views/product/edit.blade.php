<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('product.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-1 text-gray-700 dark:text-gray-200">Nama Product</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full rounded border-gray-300 text-black">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-gray-700 dark:text-gray-200">Kategori</label>
                        <select name="category_id" class="w-full rounded border-gray-300 text-black">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-gray-700 dark:text-gray-200">Qty</label>
                        <input type="number" name="qty" value="{{ old('qty', $product->qty) }}" class="w-full rounded border-gray-300 text-black">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-gray-700 dark:text-gray-200">Price</label>
                        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="w-full rounded border-gray-300 text-black">
                    </div>

                    <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded">
                        Update
                    </button>

                    <a href="{{ route('product.index') }}" class="ml-2 px-4 py-2 bg-gray-600 text-white rounded">
                        Kembali
                    </a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>