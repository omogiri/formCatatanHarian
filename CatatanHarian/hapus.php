<?php
require_once 'controller.php';

if (isset($_GET['id'])){
    $dairy = new Daily();
    $dairy -> delete($_GET['id']);
    header("Location: index.php");
}
?>