<?php
include "auth/koneksi.php";

if (isset($_GET['konfirmasi'])) {
    $id = $_GET['konfirmasi'];
    mysqli_query($conn, "UPDATE pembayaran SET status='berhasil' WHERE id_pembayaran=$id");
    header("Location: admin_pembayaran.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h2 class="mb-4">Daftar Pembayaran</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Game</th>
                <th>Harga</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Menggabungkan tabel pembayaran dengan game
        $query = "SELECT pembayaran.*, game.nama_game, game.harga_game AS harga 
                  FROM pembayaran 
                  JOIN game ON pembayaran.id_game = game.id_game 
                  ORDER BY pembayaran.id_pembayaran DESC";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['nama']}</td>
                <td>{$row['nama_game']}</td>
                <td>\${$row['harga']}</td>
                <td>{$row['email']}</td>
                <td>{$row['status']}</td>
                <td>";
            if ($row['status'] == 'pending') {
                echo "<a href='?konfirmasi={$row['id_pembayaran']}' class='btn btn-success btn-sm'>Konfirmasi</a>";
            } else {
                echo "<span class='text-success'>✔</span>";
            }
            echo "</td></tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
