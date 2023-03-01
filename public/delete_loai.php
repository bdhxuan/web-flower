<?php

include('../partials/connect.php.');


if (isset($_GET['idLoai'])){
    $id = $_GET['idLoai'];
    
    mysqli_query($conn, "delete from sanpham where idLoai = $id");
    
   if(mysqli_query($conn, "delete from loaihoa where idLoai = $id")){
       header('location: nv_loaihoa.php');
   }
   else{
       echo 'loi';
   }
}

?>