<?php

include('../partials/connect.php.');



if (isset($_GET['id_DH'])) {

    $id = trim($_GET['id_DH']);


    $sql  = "update donhang set TTDH='1' where id_DH=$id";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        header('location: nv_donhang.php');
    } else {
        echo 'loi';
    }
}
