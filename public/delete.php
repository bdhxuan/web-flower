<?php

include('../partials/connect.php.');


if (isset($_GET['id'])){
    $id = $_GET['id'];

    mysqli_query($conn, "delete from sanpham where id = $id");
    
   if(mysqli_query($conn, "delete from sanpham where id = $id")){
       header('location: nv_sanpham.php');
   }
   else{
       echo 'Lỗi';
   }
}

?>