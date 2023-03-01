<?php 

include('../partials/connect.php.');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$action = isset($_GET['action']) ? $_GET['action'] : 'add';

if($action == 'delete'){
    unset($_SESSION['sanpham'][trim($id)]);
}

header('location: view_cart.php');
?>