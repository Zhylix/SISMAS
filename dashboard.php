<?php
session_start();
require_once 'includes/config.php';
require_once 'includes/auth.php';

check_login();
// Hanya admin yang bisa akses
if ($_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit;
}

$page_title = "Dashboard Admin";
include 'includes/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 sidebar">
            <?php include 'includes/sidebar.php'; ?>
        </div>

        <!-- Main content -->
        <div class="col-md-9 col-lg-10 main">
            <h1 class="mt-3">Dashboard Admin</h1>
            
            <!-- Statistik -->
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <i class="fas fa-inbox fa-2x text-primary mb-3"></i>
                            <h5 class="card-title">Total Aspirasi</h5>
                            <div class="number">142</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <i class="fas fa-clock fa-2x text-warning mb-3"></i>
                            <h5 class="card-title">Menunggu</h5>
                            <div class="number">24</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <i class="fas fa-cog fa-2x text-info mb-3"></i>
                            <h5 class="card-title">Diproses</h5>
                            <div class="number">18</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <i class="fas fa-check-circle fa-2x text-success mb-3"></i>
                            <h5 class="card-title">Selesai</h5>
                            <div class="number">100</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik dan Tabel -->
            <div class="row mt-4">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Statistik Aspirasi</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="statisticsChart" height="250"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Kategori Aspirasi</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="categoryChart" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Aspirasi Terbaru -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Aspirasi Terbaru</h5>
                            <a href="admin/kelola_aspirasi.php" class="btn btn-primary btn-sm">Lihat Semua</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Pengirim</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data aspirasi terbaru akan diisi dari database -->
                                        <tr>
                                            <td>15 Jun 2023</td>
                                            <td>Perbaikan AC di Lab Komputer</td>
                                            <td><span class="badge category-fasilitas">Fasilitas</span></td>
                                            <td><span class="badge anonymous-badge">Anonim</span></td>
                                            <td><span class="badge status-diproses">Diproses</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                                            </td>
                                        </tr>
                                        <!-- Contoh data lainnya -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>