<?php
session_start();
require_once 'includes/config.php';
require_once 'includes/auth.php';

check_login();

$page_title = "Aspirasi";
include 'includes/header.php';
?>

<div class="container">
    <h1>Aspirasi dan Pengaduan</h1>
    
    <!-- Form Aspirasi -->
    <div class="card mt-4">
        <div class="card-header">
            <h5>Ajukan Aspirasi Baru</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="proses_aspirasi.php">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" id="kategori" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <option value="fasilitas">Fasilitas</option>
                        <option value="akademik">Akademik</option>
                        <option value="bullying">Bullying</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Aspirasi</label>
                    <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="anonim" name="anonim">
                    <label class="form-check-label" for="anonim">Kirim sebagai anonim</label>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Aspirasi</button>
            </form>
        </div>
    </div>

    <!-- Daftar Aspirasi Saya -->
    <div class="card mt-5">
        <div class="card-header">
            <h5>Aspirasi Saya</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data aspirasi user akan diisi dari database -->
                        <tr>
                            <td>15 Jun 2023</td>
                            <td>Perbaikan AC di Lab Komputer</td>
                            <td><span class="badge category-fasilitas">Fasilitas</span></td>
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

<?php include 'includes/footer.php'; ?>