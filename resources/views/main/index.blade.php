
@extends('layouts.layout')

@section('content')
        <!-- Main Content -->
       
            <!-- Welcome Section -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang Kembali! 👋</h2>
                <p class="text-gray-600">Berikut ringkasan aktivitas hari ini</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Card 1 -->
                <div
                    class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-all duration-300 fade-in">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 mb-1">Total Produk</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $countProduct }}</p>
                        </div>
                        <div class="p-3 bg-blue-100 rounded-full">
                            <i data-lucide="box" class="h-6 w-6 text-blue-600"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <span
                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <i data-lucide="trending-up" class="h-3 w-3 mr-1"></i>
                            +12%
                        </span>
                        <span class="text-sm text-gray-500 ml-2">dari bulan lalu</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-all duration-300 fade-in"
                    style="animation-delay: 0.1s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 mb-1">Keuangan</p>
                            <p class="text-3xl font-bold text-gray-900">{{ number_format($totalRevenue, 0, ',', '.') }}</p>
                        </div>
                        <div class="p-3 bg-green-100 rounded-full">
                            <i data-lucide="trending-up" class="h-6 w-6 text-green-600"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <span
                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <i data-lucide="trending-up" class="h-3 w-3 mr-1"></i>
                            +8%
                        </span>
                        <span class="text-sm text-gray-500 ml-2">dari bulan lalu</span>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-all duration-300 fade-in"
                    style="animation-delay: 0.2s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 mb-1">Total Order</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $countOrders }}</p>
                        </div>
                        <div class="p-3 bg-purple-100 rounded-full">
                            <i data-lucide="shopping-cart" class="h-6 w-6 text-purple-600"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <span
                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            <i data-lucide="trending-down" class="h-3 w-3 mr-1"></i>
                            -3%
                        </span>
                        <span class="text-sm text-gray-500 ml-2">dari bulan lalu</span>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-all duration-300 fade-in"
                    style="animation-delay: 0.3s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 mb-1">Processment Order</p>
                            <p class="text-3xl font-bold text-gray-900">3.2%</p>
                        </div>
                        <div class="p-3 bg-orange-100 rounded-full">
                            <i data-lucide="bar-chart-3" class="h-6 w-6 text-orange-600"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                        <span
                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <i data-lucide="trending-up" class="h-3 w-3 mr-1"></i>
                            +5%
                        </span>
                        <span class="text-sm text-gray-500 ml-2">dari bulan lalu</span>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Traffic Chart -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Traffic Overview</h3>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 text-xs font-medium text-blue-600 bg-blue-50 rounded-full">7
                                Hari</button>
                            <button class="px-3 py-1 text-xs font-medium text-gray-500 hover:text-gray-700">30
                                Hari</button>
                        </div>
                    </div>
                    <div
                        class="h-64 bg-gradient-to-br from-blue-50 to-indigo-100 rounded-lg flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-purple-400/20"></div>
                        <div class="relative z-10 text-center">
                            <i data-lucide="trending-up" class="h-8 w-8 text-blue-500 mx-auto mb-2"></i>
                            <p class="text-gray-600 font-medium">Chart Visualization</p>
                            <p class="text-sm text-gray-500">Data trafik website</p>
                        </div>
                    </div>
                </div>

                <!-- Sales Chart -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Sales Performance</h3>
                        <button class="text-sm text-blue-600 hover:text-blue-700 font-medium">View All</button>
                    </div>
                    <div
                        class="h-64 bg-gradient-to-br from-green-50 to-emerald-100 rounded-lg flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400/20 to-blue-400/20"></div>
                        <div class="relative z-10 text-center">
                            <i data-lucide="bar-chart-3" class="h-8 w-8 text-green-500 mx-auto mb-2"></i>
                            <p class="text-gray-600 font-medium">Sales Chart</p>
                            <p class="text-sm text-gray-500">Performa penjualan</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Activity -->
                <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200 flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Activity</h3>
                        <button class="text-sm text-blue-600 hover:text-blue-700 font-medium">View All</button>
                    </div>
                    <div class="p-6 max-h-96 overflow-y-auto">
                        <div class="space-y-4">
                            <div class="flex items-start space-x-4 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <div class="w-2 h-2 rounded-full bg-green-500 mt-2 flex-shrink-0"></div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">User baru mendaftar</p>
                                    <p class="text-xs text-gray-500 mt-1">Sarah Johnson bergabung sebagai customer - 2
                                        menit yang lalu</p>
                                </div>
                                <span class="text-xs text-gray-400">2m</span>
                            </div>

                            <div class="flex items-start space-x-4 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <div class="w-2 h-2 rounded-full bg-blue-500 mt-2 flex-shrink-0"></div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">Order completed</p>
                                    <p class="text-xs text-gray-500 mt-1">Order #1234 telah diselesaikan - 5 menit yang
                                        lalu</p>
                                </div>
                                <span class="text-xs text-gray-400">5m</span>
                            </div>

                            <div class="flex items-start space-x-4 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <div class="w-2 h-2 rounded-full bg-red-500 mt-2 flex-shrink-0"></div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">Payment failed</p>
                                    <p class="text-xs text-gray-500 mt-1">Pembayaran gagal untuk order #1235 - 10 menit
                                        yang lalu</p>
                                </div>
                                <span class="text-xs text-gray-400">10m</span>
                            </div>

                            <div class="flex items-start space-x-4 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <div class="w-2 h-2 rounded-full bg-purple-500 mt-2 flex-shrink-0"></div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">Product updated</p>
                                    <p class="text-xs text-gray-500 mt-1">Produk "Laptop Gaming" telah diperbarui - 15
                                        menit yang lalu</p>
                                </div>
                                <span class="text-xs text-gray-400">15m</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <button
                                class="w-full flex items-center space-x-3 p-3 rounded-lg border-2 border-dashed border-gray-300 hover:border-blue-500 hover:bg-blue-50 transition-colors group">
                                <i data-lucide="plus" class="h-5 w-5 text-gray-400 group-hover:text-blue-500"></i>
                                <a  href="{{ route('vendor.create') }}"><span class="text-sm font-medium text-gray-700 group-hover:text-blue-700">Add New
                                    Product</span></a>
                            </button>

                            <button
                                class="w-full flex items-center space-x-3 p-3 rounded-lg border-2 border-dashed border-gray-300 hover:border-green-500 hover:bg-green-50 transition-colors group">
                                <i data-lucide="user-plus"
                                    class="h-5 w-5 text-gray-400 group-hover:text-green-500"></i>
                                <span class="text-sm font-medium text-gray-700 group-hover:text-green-700">Invite
                                    User</span>
                            </button>

                            <button
                                class="w-full flex items-center space-x-3 p-3 rounded-lg border-2 border-dashed border-gray-300 hover:border-purple-500 hover:bg-purple-50 transition-colors group">
                                <i data-lucide="file-text"
                                    class="h-5 w-5 text-gray-400 group-hover:text-purple-500"></i>
                                <span class="text-sm font-medium text-gray-700 group-hover:text-purple-700">Generate
                                    Report</span>
                            </button>
                        </div>

                        <!-- Quick Stats -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <h4 class="text-sm font-medium text-gray-900 mb-3">Today's Summary</h4>
                            <div class="space-y-2">
                                <div class="flex justify-between items-center">
                                    <span class="text-xs text-gray-600">New Orders</span>
                                    <span class="text-xs font-medium text-gray-900">23</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-xs text-gray-600">Revenue</span>
                                    <span class="text-xs font-medium text-gray-900">Rp 2.4M</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-xs text-gray-600">Visitors</span>
                                    <span class="text-xs font-medium text-gray-900">1,234</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      

        @endsection
  