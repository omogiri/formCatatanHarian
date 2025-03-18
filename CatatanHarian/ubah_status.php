<?php
require_once 'controller.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = isset($_POST['status']) ? 'Sudah' : 'Belum'; 

    $daily = new Daily();
    $daily->ubahStatusCatatan($id, $status);

    header("Location: index.php"); 
}
?>