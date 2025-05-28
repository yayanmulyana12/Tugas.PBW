<?php
session_start();

// Fungsi untuk memeriksa apakah user sudah login
function isLoggedIn() {
    return isset($_SESSION['username']);
}

// Fungsi untuk redirect jika belum login
function redirectIfNotLoggedIn($path = 'login.php') {
    if (!isLoggedIn()) {
        header("Location: $path");
        exit;
    }
}

// Fungsi untuk mendapatkan username
function getUsername() {
    return $_SESSION['username'] ?? null;
}
?>