<?php

include('../partials/connect.php.');


if (isset($_GET['id_ND'])){
    $id = trim($_GET['id_ND']);
    // var_dump($id);
    // die();

    $data = mysqli_query($conn, "select * from chitietnd c join nguoidung t on c.id_ND = t.id_TT where t.id_ND = '$id'");

    $nv = mysqli_fetch_assoc($data);
    $id_TT = $nv['id_TT'];
    // var_dump($id_TT);
    // die();
    mysqli_query($conn, "delete from nguoidung where id_ND = $id");

    // mysqli_query($conn, "");
    
   if(mysqli_query($conn, "delete from chitietnd where id_ND = $id_TT")){
       header('location: nv_nguoidung.php');
   }
   else{
       echo 'loi';
   }
}

?>