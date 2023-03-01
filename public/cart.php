<?php

include('../partials/connect.php.');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


$sql = "select * from sanpham where id = $id";
$query =  mysqli_query($conn, "select * from sanpham where id = '$id'");


$btn = (isset($_GET['btn']))? $_GET['btn']:'add';

$action = isset($_GET['action']) ? $_GET['action'] : 'add';
$quality = isset($_GET['quality']) ? $_GET['quality'] : 1;
$sp = mysqli_fetch_assoc($query);


$item = [
    'id' => $sp['id'],
    'tensp' => $sp['TenSP'],
    'gia' => $sp['GiaGiam'] != 0 ? $sp['GiaGiam'] : $sp['Gia'],
    'giagiam' => $sp['GiaGiam'],
    'hinhanh' => $sp['HinhAnh'],
    'soluong' => $quality
];
if ($action == 'update') {
    $_SESSION['sanpham'][$id]['soluong'] = $quality;
} else {
    if (isset($_SESSION['sanpham'][$id])) {
        $_SESSION['sanpham'][$id]['soluong'] += 1;

    } else {

        $_SESSION['sanpham'][$id] = $item;
    }
}
if ($btn == 'btn'){
    
    header('location: index.php');
}
else if($btn == 'pdt'){
    header('location: refresh:0');
}
else {
    header('location: view_cart.php');
}