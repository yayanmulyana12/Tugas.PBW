<?php
include "koneksi.php";
session_start();

// Periksa apakah user sudah login (gunakan 'username' sesuai dengan login.php)
if (!isset($_SESSION['username'])) {
  die("Akses ditolak. Silakan login.");
}

// Ambil username dari session
$username = $_SESSION['username'];

// Cari id_user berdasarkan username
$query_user = "SELECT id_user FROM users WHERE username = ?";
$stmt_user = mysqli_prepare($conn, $query_user);
mysqli_stmt_bind_param($stmt_user, "s", $username);
mysqli_stmt_execute($stmt_user);
$result_user = mysqli_stmt_get_result($stmt_user);

if ($row_user = mysqli_fetch_assoc($result_user)) {
    $id_user = $row_user['id_user']; // Dapatkan ID user
    
    // Ambil data dari form
    $nama         = $_POST['nama'];
    $nomor_kartu  = $_POST['card_number'];
    $masa_berlaku = $_POST['expiry'];
    $cvv          = $_POST['cvv']; // Tambahkan CVV jika diperlukan
    $email        = $_POST['email'];
    $status       = "pending";
    $game_name    = $_POST['game_name']; // dapatkan nama game dari input form
    
    // Cari id_game berdasarkan nama game
    $query_game = "SELECT id_game FROM game WHERE nama_game = ?";
    $stmt = mysqli_prepare($conn, $query_game);
    mysqli_stmt_bind_param($stmt, "s", $game_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $id_game = $row['id_game'];
        
        // Lakukan insert ke tabel pembayaran
        $sql = "INSERT INTO pembayaran (id_user, id_game, nama, nomor_kartu, masa_berlaku, email, status)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt_insert, "iisssss", $id_user, $id_game, $nama, $nomor_kartu, $masa_berlaku, $email, $status);
        
        if (mysqli_stmt_execute($stmt_insert)) {
            echo "<script>alert('Pembayaran berhasil dikirim! Menunggu konfirmasi admin.'); window.location.href='../index.php';</script>";
        } else {
            echo "Gagal menyimpan pembayaran: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Game tidak ditemukan di database.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('User tidak ditemukan di database.'); window.location.href='../login.php';</script>";
}

mysqli_close($conn);
?>