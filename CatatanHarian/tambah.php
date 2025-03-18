<?php 
require_once 'koneksi.php';
require_once 'controller.php';

$dairy = new Daily();

$users = $dairy -> getUsers();
$categories = $dairy -> getCategories();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_id = $_POST['user_id'];
    $category_id = $_POST['category_id'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    $dairy -> insert($user_id, $category_id, $tanggal, $keterangan, 'Belum');
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
</head>
<body>
    <h2>Tambah Catatan</h2>
    <a href="index.php">🔙 Kembali ke Catatan Harian</a>
    <br><br>
    <form method="POST">
        <label>Pengguna:</label>
        <select name="user_id" required>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['id_users'] ?>"><?= $user['nama_users'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Kategori:</label>
        <select name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id_categories'] ?>"><?= $category['nama_categories'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Tanggal:</label>
        <input type="date" name="tanggal" required>
        <br>

        <label>Keterangan:</label>
        <input type="text" name="keterangan" required>
        <br>

        <button type="submit">Tambah Catatan</button>   
     </form>
</body>
</html>