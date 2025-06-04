@extends('layouts.layout')
@section('content')

<main class="p-6 sm:p-10 bg-gray-100 min-h-screen">
  <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md p-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Produk</h2>

  <form action="{{ route('vendor.update', $product->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
      </div>

      <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
        <textarea name="description" id="description" rows="4" required
                  class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200">{{ old('description', $product->description) }}</textarea>
      </div>

      <div>
        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
        <div class="relative">
          <input type="number" name="price" id="price" min="0" step="100" value="{{ old('price', $product->price) }}" required
                 class="w-full px-4 py-2 pr-16 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
          <span class="absolute right-4 top-2.5 text-gray-500">IDR</span>
        </div>
      </div>

      <div>
        <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stok Produk</label>
        <input type="number" name="stock" id="stock" min="0" value="{{ old('stock', $product->stock) }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
      </div>

      <div class="pt-4 flex justify-end gap-3">
        <a href="{{ route('vendor.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">Batal</a>
        <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</main>

@endsection
