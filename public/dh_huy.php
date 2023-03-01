<?php

include('../partials/connect.php.');

$donhang = mysqli_query($conn, "select * from donhang where id_DH =" . $_GET['id_DH']);
$dh = mysqli_fetch_array($donhang);



if (isset($_GET['id_DH'])) {
    $id = $_GET['id_DH'];


    if (mysqli_query($conn, "delete from dh_chitiet where id_DH = $id")) {
        if (mysqli_query($conn, "delete from donhang where id_DH = $id")) {
            header('location: donhang.php?id_ND=' . $dh['id_ND']);
        } else {
            echo 'loi';
        }
    }
    
}
