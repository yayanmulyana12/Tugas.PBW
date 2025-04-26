<?php
$bandara_asal = [
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000
];

$bandara_tujuan = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000
];

$maskapai = $_POST['maskapai'];
$asal = $_POST['bandara_asal'];
$tujuan = $_POST['bandara_tujuan'];
$harga_tiket = (int)$_POST['harga_tiket'];

$pajak_asal = $bandara_asal[$asal] ?? 0;
$pajak_tujuan = $bandara_tujuan[$tujuan] ?? 0;

$total_pajak = $pajak_asal + $pajak_tujuan;
$total_harga = $harga_tiket + $total_pajak;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Hasil Pendaftaran</h1>

    <table>
        <tr>
            <th>Maskapai</th>
            <td><?= htmlspecialchars($maskapai) ?></td>
        </tr>
        <tr>
            <th>Asal</th>
            <td><?= htmlspecialchars($asal) ?></td>
        </tr>
        <tr>
            <th>Tujuan</th>
            <td><?= htmlspecialchars($tujuan) ?></td>
        </tr>
        <tr>
            <th>Harga Tiket</th>
            <td>Rp <?= number_format($harga_tiket, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <th>Total Pajak</th>
            <td>Rp <?= number_format($total_pajak, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td><strong>Rp <?= number_format($total_harga, 0, ',', '.') ?></strong></td>
        </tr>
    </table>

    <a href="index.php" class="btn-back">Kembali</a>
</div>

</body>
</html>
