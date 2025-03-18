<?php
require_once 'controller.php';

$daily = new Daily();
$data = $daily -> getAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Catatan Harian</h2>
    <span>✅</span>  
    <a href="catatan_sudah.php">Lihat Catatan Selesai</a> |
    <span>⏳</span> 
    <a href="catatan_belum.php">Lihat Catatan Belum Selesai</a>

    <br><br>
    <a href="tambah.php">Tambah Data</a>
    <table border="1" cellspacing="0" cellpadding="0">
        <tr>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Pengguna</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['tanggal']?></td>
                <td><?= $row['keterangan']?></td>
                <td><?= $row['pengguna']?></td>
                <td><?= $row['kategori']?></td>
                <td>
                    <form action="ubah_status.php" method="POST">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="checkbox" name="status" value="Sudah" 
                            <?= ($row['status'] == 'Sudah') ? 'checked' : ''; ?> 
                        onchange="this.form.submit()">
                    </form>
                </td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach?>
    </table>
</body>
</html>