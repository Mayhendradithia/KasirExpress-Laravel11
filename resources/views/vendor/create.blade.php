@extends('layouts.layout')
@section('content')

<main class="p-6 sm:p-10 bg-gray-100">
  <div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Tambah Produk Baru</h1>
  </div>

  <div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('vendor.store') }}" method="POST" class="space-y-6">
      @csrf

      <div>
        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Produk</label>
        <input type="text" name="name" id="nama" value="{{ old('name') }}" required
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
        @error('name')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" id="description" rows="3" required
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">{{ old('description') }}</textarea>
        @error('description')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
        <input type="number" name="price" id="price" value="{{ old('price') }}" required
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
        @error('price')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="stock" class="block text-sm font-medium text-gray-700">Stok Produk</label>
        <input type="number" name="stock" id="stock" value="{{ old('stock') }}" required
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
        @error('stock')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-end space-x-4">
        <a href="{{ route('vendor.index') }}" class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300 transition">Batal</a>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Simpan</button>
      </div>
    </form>
  </div>
</main>

@endsection
