<?php
include 'config.php';

// User Functions
function registerUser($nama, $email, $password, $role = 'siswa') {
    global $pdo;
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$nama, $email, $hashedPassword, $role]);
}

function loginUser($email, $password) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        return true;
    }
    return false;
}

// Aspiration Functions
function createAspiration($user_id, $judul, $kategori, $isi, $anonim = false) {
    global $pdo;
    
    $stmt = $pdo->prepare("INSERT INTO aspirasi (user_id, judul, kategori, isi, anonim, status) VALUES (?, ?, ?, ?, ?, 'menunggu')");
    return $stmt->execute([$user_id, $judul, $kategori, $isi, $anonim]);
}

function getAspirations($limit = null, $status = null) {
    global $pdo;
    
    $sql = "SELECT a.*, u.nama FROM aspirasi a LEFT JOIN users u ON a.user_id = u.id";
    $params = [];
    
    if ($status) {
        $sql .= " WHERE a.status = ?";
        $params[] = $status;
    }
    
    $sql .= " ORDER BY a.tanggal DESC";
    
    if ($limit) {
        $sql .= " LIMIT ?";
        $params[] = $limit;
    }
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function updateAspirationStatus($id, $status, $tanggapan = null) {
    global $pdo;
    
    $sql = "UPDATE aspirasi SET status = ?, tanggapan_admin = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$status, $tanggapan, $id]);
}

// Statistics Functions
function getAspirationStats() {
    global $pdo;
    
    $stats = [];
    
    // Total aspirations
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM aspirasi");
    $stats['total'] = $stmt->fetch()['total'];
    
    // Status counts
    $stmt = $pdo->query("SELECT status, COUNT(*) as count FROM aspirasi GROUP BY status");
    $statusCounts = $stmt->fetchAll();
    
    foreach ($statusCounts as $row) {
        $stats[$row['status']] = $row['count'];
    }
    
    // Category counts
    $stmt = $pdo->query("SELECT kategori, COUNT(*) as count FROM aspirasi GROUP BY kategori");
    $stats['categories'] = $stmt->fetchAll();
    
    return $stats;
}

// Notification Functions
function createNotification($user_id, $pesan) {
    global $pdo;
    
    $stmt = $pdo->prepare("INSERT INTO notifikasi (user_id, pesan) VALUES (?, ?)");
    return $stmt->execute([$user_id, $pesan]);
}

function getUnreadNotifications($user_id) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM notifikasi WHERE user_id = ? AND dibaca = 0 ORDER BY tanggal DESC");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}
?>