<?php
require_once 'koneksi.php';
require_once 'controller.php';

$daily = new Daily();
$data = $daily->getCatatanSelesai(); 

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan yang Sudah Selesai</title>
</head>
<body>
    <h2>✅ Catatan yang Sudah Selesai</h2>
    <a href="index.php">🔙 Kembali ke Semua Catatan</a>
    <br><br>
    
    <table border="1" cellspacing="0" cellpadding="0">
        <tr>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Pengguna</th>
            <th>Kategori</th>
        </tr>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['keterangan'] ?></td>
                <td><?= $row['pengguna'] ?></td>
                <td><?= $row['kategori'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
