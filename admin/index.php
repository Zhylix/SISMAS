<?php include '../includes/header.php'; ?>

<div class="flex h-screen bg-gray-50">
    <!-- Sidebar -->
    <?php include '../includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="ml-4 text-2xl font-semibold text-gray-800">Dashboard</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <button @click="darkMode = !darkMode" class="text-gray-500 hover:text-gray-700 transition duration-300">
                        <i class="fas" :class="{ 'fa-moon': !darkMode, 'fa-sun': darkMode }"></i>
                    </button>
                    <div class="relative">
                        <button class="text-gray-500 hover:text-gray-700 transition duration-300">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute top-0 right-0 block h-2 w-2 bg-red-500 rounded-full"></span>
                        </button>
                    </div>
                    <div class="relative">
                        <button @click="profileOpen = !profileOpen" class="flex items-center space-x-2 focus:outline-none">
                            <img class="h-8 w-8 rounded-full object-cover" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Admin">
                            <span class="text-gray-700">Admin</span>
                            <i class="fas fa-chevron-down text-gray-500 text-sm"></i>
                        </button>
                        
                        <!-- Profile Dropdown -->
                        <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-1 z-50">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition duration-300">
                                <i class="fas fa-user mr-2"></i>Profil
                            </a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition duration-300">
                                <i class="fas fa-cog mr-2"></i>Pengaturan
                            </a>
                            <div class="border-t border-gray-200"></div>
                            <a href="../login.php" class="block px-4 py-2 text-red-600 hover:bg-gray-100 transition duration-300">
                                <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Aspirasi -->
                <div class="bg-white rounded-xl shadow-sm p-6 transform transition duration-300 hover:scale-105">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <i class="fas fa-inbox text-blue-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Total Aspirasi</p>
                            <h3 class="text-2xl font-bold text-gray-800">142</h3>
                        </div>
                    </div>
                </div>

                <!-- Menunggu -->
                <div class="bg-white rounded-xl shadow-sm p-6 transform transition duration-300 hover:scale-105">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-100 rounded-lg">
                            <i class="fas fa-clock text-yellow-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Menunggu</p>
                            <h3 class="text-2xl font-bold text-gray-800">24</h3>
                        </div>
                    </div>
                </div>

                <!-- Diproses -->
                <div class="bg-white rounded-xl shadow-sm p-6 transform transition duration-300 hover:scale-105">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-lg">
                            <i class="fas fa-cog text-purple-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Diproses</p>
                            <h3 class="text-2xl font-bold text-gray-800">18</h3>
                        </div>
                    </div>
                </div>

                <!-- Selesai -->
                <div class="bg-white rounded-xl shadow-sm p-6 transform transition duration-300 hover:scale-105">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-lg">
                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Selesai</p>
                            <h3 class="text-2xl font-bold text-gray-800">100</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Statistics Chart -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistik Aspirasi</h3>
                    <canvas id="statisticsChart" height="250"></canvas>
                </div>

                <!-- Category Chart -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Kategori Aspirasi</h3>
                    <canvas id="categoryChart" height="250"></canvas>
                </div>
            </div>

            <!-- Recent Aspirations -->
            <div class="bg-white rounded-xl shadow-sm">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Aspirasi Terbaru</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengirim</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Data rows would be populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Charts initialization
    document.addEventListener('DOMContentLoaded', function() {
        // Statistics Chart
        const statisticsCtx = document.getElementById('statisticsChart').getContext('2d');
        const statisticsChart = new Chart(statisticsCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [
                    {
                        label: 'Aspirasi Masuk',
                        data: [12, 19, 15, 25, 22, 30],
                        borderColor: '#4a90e2',
                        backgroundColor: 'rgba(74, 144, 226, 0.1)',
                        tension: 0.3,
                        fill: true
                    },
                    {
                        label: 'Aspirasi Selesai',
                        data: [8, 12, 10, 18, 20, 25],
                        borderColor: '#5cb85c',
                        backgroundColor: 'rgba(92, 184, 92, 0.1)',
                        tension: 0.3,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });

        // Category Chart
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        const categoryChart = new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: ['Fasilitas', 'Akademik', 'Bullying', 'Lainnya'],
                datasets: [{
                    data: [45, 30, 15, 10],
                    backgroundColor: [
                        '#e9ecef',
                        '#d4edda',
                        '#f8d7da',
                        '#fff3cd'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    });
</script>

<?php include '../includes/footer.php'; ?>