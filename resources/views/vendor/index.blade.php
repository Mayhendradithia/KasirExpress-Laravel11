@extends('layouts.layout')

@section('content')

<main class="p-6 sm:p-10 bg-gray-100">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Data Produk</h1>
    <a href="{{ route('vendor.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
      Tambah Produk
    </a>
  </div>

  <div class="bg-white shadow rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok Produk</th>
          <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($product as $products)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $products->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $products->description }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ number_format($products->price, 0, ',', '.') }} IDR</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $products->stock }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <a href="{{ route('vendor.edit', $products->id) }}" class="text-blue-600 hover:text-blue-800 mr-4">Edit</a>
              <form action="{{ route('vendor.destroy', $products->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada data produk.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</main>

@endsection


