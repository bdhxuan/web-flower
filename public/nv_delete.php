<?php

include('../partials/connect.php.');


if (isset($_GET['id'])){
    $id = $_GET['id'];

    $data = mysqli_query($conn, "select * from chitietnd c join thanhvien t on c.id_ND = t.id_TT where id = '$id'");

    $nv = mysqli_fetch_assoc($data);
    $id_TT = $nv['id_TT'];
    // var_dump($id_TT);
    // die();
    mysqli_query($conn, "delete from thanhvien where id = $id");

    // mysqli_query($conn, "");
    
   if(mysqli_query($conn, "delete from chitietnd where id_ND = $id_TT")){
       header('location: nv_thanhvien.php');
   }
   else{
       echo 'loi';
   }
}

?>