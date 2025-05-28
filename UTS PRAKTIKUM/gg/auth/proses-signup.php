<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah digunakan!'); window.location='signup.php';</script>";
    } else {
        $query = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Berhasil daftar! Silakan login.'); window.location='../login.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
