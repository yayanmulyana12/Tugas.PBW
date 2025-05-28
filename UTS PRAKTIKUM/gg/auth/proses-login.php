<?php
include 'koneksi.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Gunakan prepared statement untuk mencegah SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Simpan lebih banyak informasi yang berguna di session
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id_user'];
            $_SESSION['logged_in'] = true;
            $_SESSION['login_time'] = time();
            
            // Redirect ke homepage
            echo "<script>alert('Login berhasil!'); window.location='../index.php';</script>";
            exit;
        }
    }

    echo "<script>alert('Username atau password salah!'); window.location='../login.php';</script>";
}
?>