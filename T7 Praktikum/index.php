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

ksort($bandara_asal);
ksort($bandara_tujuan);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Penerbangan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Pendaftaran Rute Penerbangan</h1>

    <form action="proses.php" method="POST">
        <div class="form-group">
            <label>Nama Maskapai:</label>
            <input type="text" name="maskapai" required>
        </div>

        <div class="form-group">
            <label>Bandara Asal:</label>
            <select name="bandara_asal" required>
                <?php foreach ($bandara_asal as $nama => $pajak): ?>
                    <option value="<?= $nama ?>"><?= $nama ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Bandara Tujuan:</label>
            <select name="bandara_tujuan" required>
                <?php foreach ($bandara_tujuan as $nama => $pajak): ?>
                    <option value="<?= $nama ?>"><?= $nama ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Harga Tiket (Rp):</label>
            <input type="number" name="harga_tiket" required>
        </div>

        <button type="submit" class="btn-submit">Proses</button>
    </form>
</div>

</body>
</html>
