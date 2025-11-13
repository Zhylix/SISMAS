<!-- Sidebar -->
<aside class="w-64 bg-white dark:bg-gray-800 shadow-lg transform transition-transform duration-300 lg:translate-x-0 lg:static fixed inset-y-0 left-0 z-40" 
        :class="{ '-translate-x-full': !sidebarOpen }">
    <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center space-x-2">
            <i class="fas fa-comments text-blue-600 text-2xl"></i>
            <span class="text-xl font-bold text-gray-800 dark:text-white">SISMAS</span>
        </div>
        <button @click="sidebarOpen = false" class="text-gray-500 lg:hidden">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>

    <nav class="mt-6">
        <a href="index.php" class="flex items-center px-6 py-3 text-gray-700 dark:text-gray-200 bg-blue-50 dark:bg-blue-900 border-r-4 border-blue-600">
            <i class="fas fa-tachometer-alt mr-3"></i>
            <span>Dashboard</span>
        </a>
        <a href="aspirasi.php" class="flex items-center px-6 py-3 mt-2 text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
            <i class="fas fa-inbox mr-3"></i>
            <span>Kelola Aspirasi</span>
        </a>
        <a href="statistik.php" class="flex items-center px-6 py-3 mt-2 text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
            <i class="fas fa-chart-pie mr-3"></i>
            <span>Statistik</span>
        </a>
        <a href="pengaturan.php" class="flex items-center px-6 py-3 mt-2 text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
            <i class="fas fa-cog mr-3"></i>
            <span>Pengaturan</span>
        </a>
    </nav>
</aside>