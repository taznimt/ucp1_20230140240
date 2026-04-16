<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <p class="mb-2 text-gray-800 dark:text-gray-100">
                    <strong>Nama:</strong> {{ $product->name }}
                </p>

                <p class="mb-2 text-gray-800 dark:text-gray-100">
                    <strong>Qty:</strong> {{ $product->qty }}
                </p>

                <p class="mb-2 text-gray-800 dark:text-gray-100">
                    <strong>Price:</strong> {{ $product->price }}
                </p>

                <p class="mb-2 text-gray-800 dark:text-gray-100">
                    <strong>Dibuat oleh:</strong> {{ $product->user->name ?? '-' }}
                </p>

                <a href="{{ route('product.index') }}"
                   class="inline-block mt-4 px-4 py-2 bg-gray-600 text-white rounded">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>