<!-- edit-process.php -->
<?php
include 'koneksi.php';

$id = $_POST['id'];
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);

$conn->query("UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id");

header("Location: index.php");
?>
