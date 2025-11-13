<?php
session_start();
require_once 'includes/config.php';
require_once 'includes/auth.php';

check_login();

$page_title = "Statistik";
include 'includes/header.php';
?>

<div class="container">
    <h1>Statistik Aspirasi</h1>
    
    <div class="row mt-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5>Statistik Aspirasi Per Bulan</h5>
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

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Status Aspirasi</h5>
                </div>
                <div class="card-body">
                    <canvas id="statusChart" height="250"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>