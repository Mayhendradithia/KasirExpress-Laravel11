<header class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
    <div class="px-6 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <button class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors" onclick="toggleSidebar()">
                <i data-lucide="menu" class="h-6 w-6 text-gray-600"></i>
            </button>
            <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
        </div>

        <div class="flex items-center space-x-4">
            <!-- Search Bar -->
            <div class="relative hidden md:block">
                <i data-lucide="search"
                    class="absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-400"></i>
                <input type="search" placeholder="Cari..."
                    class="pl-10 pr-4 py-2 w-64 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" />
            </div>

            <!-- Notifications -->
            <button
                class="relative p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                <i data-lucide="bell" class="h-5 w-5"></i>
                <span
                    class="absolute -top-1 -right-1 h-4 w-4 bg-red-500 rounded-full flex items-center justify-center text-xs text-white font-medium">3</span>
            </button>

            <!-- Settings -->
            <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                <i data-lucide="settings" class="h-5 w-5"></i>
            </button>

            <!-- Profile -->
            <div class="flex items-center space-x-3 pl-4 border-l border-gray-200">
                <div
                    class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                    <span class="text-white text-sm font-medium">
                        {{ strtoupper(substr($users->name, 0, 2)) }}
                    </span>
                </div>
                <div class="hidden md:block">
                    <p class="text-sm font-medium text-gray-900">{{ $users->name }}</p>
                    <p class="text-xs text-gray-500">{{ $users->email }}</p>
                </div>
            </div>


        </div>
    </div>
</header>

<div class="flex">
    <!-- Sidebar -->
    <aside id="sidebar" class="hidden lg:block w-64 bg-white border-r border-gray-200 h-screen sticky top-16">
        <nav class="p-6">
            <ul class="space-y-2">
                <li>
                    <a href="#"
                        class="flex items-center space-x-3 p-3 rounded-lg bg-blue-50 text-blue-700 font-medium border border-blue-200">
                        <i data-lucide="bar-chart-3" class="h-5 w-5"></i>
                        <span>Overview</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                        <i data-lucide="users" class="h-5 w-5"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                        <i data-lucide="box" class="h-5 w-5"></i>
                        <span>Product</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                        <i data-lucide="shopping-cart" class="h-5 w-5"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                        <i data-lucide="trending-up" class="h-5 w-5"></i>
                        <span>Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                        <i data-lucide="credit-card" class="h-5 w-5"></i>
                        <span>Payments</span>
                    </a>
                </li>
            </ul>

            <!-- Bottom Menu -->
            <div class="mt-8 pt-8 border-t border-gray-200">
                <ul class="space-y-2">
                    <li>
                        <a href="#"
                            class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            <i data-lucide="help-circle" class="h-5 w-5"></i>
                            <span>Help</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            <i data-lucide="log-out" class="h-5 w-5"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
