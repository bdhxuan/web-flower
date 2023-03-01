<?php

include('../partials/connect.php.');

// var_dump($_GET['id_DH']);
// die();

if (isset($_GET['id_DH'])) {
    $id = $_GET['id_DH'];
    if (mysqli_query($conn, "delete from dh_chitiet where id_DH = $id")) {
        if (mysqli_query($conn, "delete from donhang where id_DH = $id")) {
            header('location: nv_donhang.php');
        } else {
            echo 'loi';
        }
    }
}
