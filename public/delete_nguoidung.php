<?php

include('../partials/connect.php.');


if (isset($_GET['id_ND'])){
    $id = $_GET['id_ND'];

    // mysqli_query($conn, "delete from sanpham where id = $id");
    
   if(mysqli_query($conn, "delete from nguoidung where id_ND = $id")){
       header('location: nv_nguoidung.php');
   }
   else{
       echo 'loi';
   }
}

?>