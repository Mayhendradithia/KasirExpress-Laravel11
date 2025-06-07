@extends('layouts.layout')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        POS Order
                    </h2>
                    <p class="text-gray-600 mt-1">Create a new order for your customer</p>
                </div>
            </div>

            <!-- Order Form -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif


                <form action="{{ route('pos.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf

                    <!-- Product Selection -->
                    <div id="product-container">
                        <div class="space-y-2 product-row mb-3 flex items-start gap-4">
                            <div class="flex-1">
                                <label class="block text-sm font-semibold text-gray-700">
                                    Select Product
                                </label>
                                <select name="products[0][product_id]"
                                    class="w-full px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 bg-white text-gray-900 product-select"
                                    required>
                                    <option value="" disabled selected>Choose a product...</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}"
                                            {{ $product->stock <= 0 ? 'disabled' : '' }}>
                                            {{ $product->name }} (Stock:
                                            {{ $product->stock <= 0 ? 'Habis' : $product->stock }})
                                        </option>
                                    @endforeach
                                </select>


                                <input type="number" name="products[0][quantity]"
                                    class="quantity-input mt-2 w-full px-3 py-2 border border-gray-300 rounded-lg"
                                    min="1" placeholder="Qty" required>

                                <div class="stock-alert text-red-600 text-sm font-medium mt-1 hidden">
                                    ⚠️ Stok produk habis!
                                </div>
                            </div>

                            <button type="button"
                                class="remove-row bg-red-500 text-white px-3 py-3 rounded-md hover:bg-red-600 self-center">
                                &times;
                            </button>


                        </div>
                    </div>


                    <button type="button" id="add-product-btn" class="mt-3 px-4 py-2 bg-blue-600 text-white rounded">
                        + Tambah Produk
                    </button>



                    <!-- Quantity -->


                    <div class="space-y-2">
                        <label for="payment_method" class="block text-sm font-semibold text-gray-700">
                            Payment Method
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <label class="relative">
                                <input type="radio" name="payment_method" value="cash" class="sr-only peer" checked>
                                <div
                                    class="p-4 border-2 border-gray-200 rounded-lg cursor-pointer transition-all duration-200 peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:border-gray-300">
                                    <div class="flex items-center justify-center flex-col">
                                        <svg class="w-6 h-6 text-green-600 mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                            </path>
                                        </svg>
                                        <span class="font-medium text-gray-900">Cash</span>
                                    </div>
                                </div>
                            </label>

                            <label class="relative">
                                <input type="radio" name="payment_method" value="midtrans" class="sr-only peer">
                                <div
                                    class="p-4 border-2 border-gray-200 rounded-lg cursor-pointer transition-all duration-200 peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:border-gray-300">
                                    <div class="flex items-center justify-center flex-col">
                                        <svg class="w-6 h-6 text-blue-600 mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                            </path>
                                        </svg>
                                        <span class="font-medium text-gray-900">Midtrans</span>
                                    </div>
                                </div>
                            </label>

                            <label class="relative">
                                <input type="radio" name="payment_method" value="qris" class="sr-only peer">
                                <div
                                    class="p-4 border-2 border-gray-200 rounded-lg cursor-pointer transition-all duration-200 peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:border-gray-300">
                                    <div class="flex items-center justify-center flex-col">
                                        <svg class="w-6 h-6 text-purple-600 mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z">
                                            </path>
                                        </svg>
                                        <span class="font-medium text-gray-900">QRIS</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Action Buttons -->

                    <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200">
                        <button type="button" onclick="window.location.reload();"
                            class="flex-1 px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-red-200 transition-colors duration-200 flex items-center justify-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Cancel
                        </button>




                        <button type="submit"
                            class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 transition-all duration-200 flex items-center justify-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create Order
                        </button>
                    </div>
                </form>
            </div>

            <!-- Order Summary Card (Optional Enhancement) -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mt-6">
                <div class="px-6 py-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Order Summary</h3>
                    <div class="space-y-2 text-sm">
                        <div>
                            <span class="text-gray-600 font-semibold">Product:</span>
                            <ul id="selected-products-list" class="list-disc list-inside text-gray-800 mt-1">
                                <!-- Nama produk akan muncul di sini -->
                            </ul>
                        </div>

                        <div class="flex justify-between mt-3">
                            <span class="text-gray-600 font-semibold">Total Harga:</span>
                            <span class="font-bold text-lg" id="total-price">Rp 0</span>
                        </div>


                        <div class="flex justify-between mt-3">
                            <span class="text-gray-600">Payment Method:</span>
                            <span class="font-medium" id="selected-payment">Cash</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script>
        const products = @json($products);
        let productIndex = 1;

        function updateOrderSummary() {
            const productRows = document.querySelectorAll('.product-row');
            const productList = document.getElementById('selected-products-list');
            const totalPriceEl = document.getElementById('total-price');

            productList.innerHTML = '';
            let totalPrice = 0;

            productRows.forEach(row => {
                const select = row.querySelector('.product-select');
                const qtyInput = row.querySelector('.quantity-input');

                if (select && select.value && qtyInput && qtyInput.value > 0) {
                    const option = select.options[select.selectedIndex];
                    const productName = option.textContent.trim();
                    const quantity = parseInt(qtyInput.value);

                    const productId = parseInt(select.value);
                    const product = products.find(p => p.id === productId);
                    const price = product ? parseFloat(product.price) : 0;

                    const linePrice = price * quantity;
                    totalPrice += linePrice;

                    const li = document.createElement('li');
                    li.textContent = `${productName} (Qty: ${quantity}) - Rp ${linePrice.toLocaleString('id-ID')}`;
                    productList.appendChild(li);
                }
            });

            totalPriceEl.textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
        }

        function updatePaymentMethod() {
            const selectedRadio = document.querySelector('input[name="payment_method"]:checked');
            const label = selectedRadio ?
                selectedRadio.nextElementSibling.querySelector('span')?.textContent :
                'Cash';
            document.getElementById('selected-payment').textContent = label;
        }

        // Add new product row
        document.getElementById('add-product-btn').addEventListener('click', function() {
            const container = document.getElementById('product-container');

            const row = document.createElement('div');
            row.classList.add('space-y-2', 'product-row', 'mb-3', 'flex', 'items-start', 'gap-4');

            row.innerHTML = `
            <div class="flex-1">
                <label class="block text-sm font-semibold text-gray-700">Select Product</label>
                <select name="products[${productIndex}][product_id]" class="product-select w-full px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 bg-white text-gray-900" required>
                    <option value="" disabled selected>Choose a product...</option>
                    ${products.map(product => `
                                    <option value="${product.id}" ${product.stock <= 0 ? 'disabled' : ''}>
                                        ${product.name} (Stock: ${product.stock <= 0 ? 'Habis' : product.stock})
                                    </option>
                                `).join('')}
                </select>

                <input type="number" name="products[${productIndex}][quantity]" class="quantity-input mt-2 w-full px-3 py-2 border border-gray-300 rounded-lg" min="1" placeholder="Qty" required>

                <div class="stock-alert text-red-600 text-sm font-medium mt-1 hidden">
                    ⚠️ Stok produk habis!
                </div>
            </div>

            <button type="button"
    class="remove-row bg-red-500 text-white px-3 py-3 rounded-md hover:bg-red-600 self-center">
    &times;
</button>
        `;

            container.appendChild(row);
            productIndex++;

            // Bind event listener untuk elemen baru
            row.querySelector('.product-select').addEventListener('change', updateOrderSummary);
            row.querySelector('.quantity-input').addEventListener('input', updateOrderSummary);
        });

        // Handle stock alert
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('product-select')) {
                const selectedId = parseInt(e.target.value);
                const alertBox = e.target.closest('.product-row').querySelector('.stock-alert');
                const selectedProduct = products.find(p => p.id === selectedId);

                if (selectedProduct && selectedProduct.stock <= 0) {
                    alertBox.classList.remove('hidden');
                } else {
                    alertBox.classList.add('hidden');
                }
            }
        });

        // Delete row
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-row')) {
                const row = e.target.closest('.product-row');
                row.remove();
                updateOrderSummary(); // Refresh summary after delete
            }
        });

        // Global delegation for input/change on all rows
        document.addEventListener('input', function(e) {
            if (e.target.classList.contains('quantity-input')) {
                updateOrderSummary();
            }
        });

        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('product-select')) {
                updateOrderSummary();
            }
        });

        // Payment method listener
        document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
            radio.addEventListener('change', updatePaymentMethod);
        });

        // Initial update
        document.addEventListener('DOMContentLoaded', function() {
            updateOrderSummary();
            updatePaymentMethod();
        });
    </script>
@endsection
