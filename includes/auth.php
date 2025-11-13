<?php
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function check_login() {
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}

// Fungsi untuk mendapatkan data user
function get_user_data($user_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>