<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISMAS - Sistem Aspirasi & Pengaduan Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.0/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-comments text-blue-600 text-2xl"></i>
                    <span class="text-xl font-bold text-gray-800">SISMAS</span>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="text-gray-600 hover:text-blue-600 transition duration-300">Fitur</a>
                    <a href="#about" class="text-gray-600 hover:text-blue-600 transition duration-300">Tentang</a>
                    <a href="login.php" class="text-gray-600 hover:text-blue-600 transition duration-300">Masuk</a>
                    <a href="register.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 transform hover:-translate-y-0.5">
                        Daftar Sekarang
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-600 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" class="md:hidden py-4 border-t border-gray-200">
                <a href="#features" class="block py-2 text-gray-600 hover:text-blue-600">Fitur</a>
                <a href="#about" class="block py-2 text-gray-600 hover:text-blue-600">Tentang</a>
                <a href="login.php" class="block py-2 text-gray-600 hover:text-blue-600">Masuk</a>
                <a href="register.php" class="block py-2 text-blue-600 font-semibold">Daftar</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="gradient-bg text-white">
        <div class="max-w-7xl mx-auto px-4 py-20">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in-up">
                    Sistem Aspirasi & Pengaduan Sekolah
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-blue-100 animate-fade-in-up animation-delay-200">
                    Wadah transparan untuk menyampaikan aspirasi, saran, dan keluhan
                </p>
                <div class="animate-fade-in-up animation-delay-400">
                    <a href="register.php" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold text-lg hover:bg-gray-100 transition duration-300 transform hover:scale-105 inline-block mr-4">
                        Mulai Sekarang
                    </a>
                    <a href="#features" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold text-lg hover:bg-white hover:text-blue-600 transition duration-300">
                        Pelajari Fitur
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-4">Fitur Unggulan</h2>
            <p class="text-gray-600 text-center mb-12 max-w-2xl mx-auto">Platform lengkap untuk menampung semua aspirasi dan pengaduan warga sekolah</p>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-gray-50 rounded-xl p-6 card-hover">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-user-secret text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Mode Anonim</h3>
                    <p class="text-gray-600">Sampaikan aspirasi tanpa khawatir dengan fitur pengiriman anonim</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-gray-50 rounded-xl p-6 card-hover">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-chart-bar text-green-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Statistik Real-time</h3>
                    <p class="text-gray-600">Pantau perkembangan aspirasi melalui dashboard dengan grafik interaktif</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-gray-50 rounded-xl p-6 card-hover">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-bell text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Notifikasi Real-time</h3>
                    <p class="text-gray-600">Dapatkan pemberitahuan instan ketika status aspirasi berubah</p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-gray-50 rounded-xl p-6 card-hover">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-tags text-orange-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Kategori Terorganisir</h3>
                    <p class="text-gray-600">Kelola aspirasi berdasarkan kategori seperti fasilitas, akademik, bullying, dll</p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-gray-50 rounded-xl p-6 card-hover">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-moon text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Dark Mode</h3>
                    <p class="text-gray-600">Nikmati pengalaman menggunakan aplikasi dengan tema gelap yang nyaman di mata</p>
                </div>

                <!-- Feature 6 -->
                <div class="bg-gray-50 rounded-xl p-6 card-hover">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-download text-indigo-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Export Data</h3>
                    <p class="text-gray-600">Ekspor data aspirasi ke format Excel atau PDF untuk kebutuhan laporan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Tentang SISMAS</h2>
                    <p class="text-gray-600 mb-6">
                        SISMAS adalah platform inovatif yang dirancang untuk memfasilitasi komunikasi antara siswa, guru, 
                        dan pihak sekolah melalui sistem pengajuan aspirasi dan pengaduan yang transparan dan efisien.
                    </p>
                    <p class="text-gray-600 mb-8">
                        Dengan teknologi modern dan antarmuka yang user-friendly, SISMAS memastikan setiap suara didengar 
                        dan setiap masalah mendapatkan perhatian yang semestinya.
                    </p>
                    <div class="flex space-x-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">500+</div>
                            <div class="text-gray-600">Pengguna</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">1,200+</div>
                            <div class="text-gray-600">Aspirasi</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-purple-600">95%</div>
                            <div class="text-gray-600">Kepuasan</div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-white rounded-2xl p-6 shadow-xl transform rotate-3 transition duration-300 hover:rotate-0">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                            <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                            <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-blue-600 text-sm"></i>
                                </div>
                                <div class="bg-gray-100 rounded-lg p-3 flex-1">
                                    <p class="text-sm text-gray-700">"Platform ini sangat membantu! Aspirasi kami benar-benar didengar dan ditindaklanjuti."</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user-tie text-green-600 text-sm"></i>
                                </div>
                                <div class="bg-gray-100 rounded-lg p-3 flex-1">
                                    <p class="text-sm text-gray-700">"Sebagai admin, dashboard yang intuitif memudahkan saya memantau semua aspirasi."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-comments text-blue-400 text-2xl"></i>
                        <span class="text-xl font-bold">SISMAS</span>
                    </div>
                    <p class="text-gray-400">Platform aspirasi dan pengaduan sekolah yang transparan dan efisien.</p>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#features" class="hover:text-white transition duration-300">Fitur</a></li>
                        <li><a href="#about" class="hover:text-white transition duration-300">Tentang</a></li>
                        <li><a href="login.php" class="hover:text-white transition duration-300">Masuk</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Kontak</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-envelope text-blue-400"></i>
                            <span>sismas@sekolah.sch.id</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-phone text-blue-400"></i>
                            <span>(021) 1234-5678</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-600 transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-400 transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-pink-600 transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 SISMAS. Hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // Animasi scroll
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll untuk anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Animasi fade in pada scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in-up');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.card-hover').forEach(card => {
                observer.observe(card);
            });
        });
    </script>
</body>
</html>