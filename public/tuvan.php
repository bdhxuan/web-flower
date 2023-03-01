<?php

include('../partials/connect.php.');

$ng = mysqli_query($conn, "select * from nguoidung");

$err = [];
if (isset($_POST['TenND'])) {
    $ten = $_POST['TenND'];
    $email = $_POST['Email'];
    $sdt = $_POST['SDT'];
    $diachi = $_POST['DiaChi'];
    $matkhau = $_POST['MatKhau'];
    $rmatkhau = $_POST['rMatKhau'];
    if (empty($ten)) {
        $err['ten'] = "Bạn chưa nhập tên";
    }
    if (empty($email)) {
        $err['email'] = "Bạn chưa nhập Email";
    }
    if (!empty($email)) {
        foreach ($ng as $key => $value) : {
                if (strlen(strstr($value['Email'], $email)) > 0) {
                    $err['email'] = "Email này đã tồn tại";
                }
            }
        endforeach;
    }
    if (strlen($sdt) != 10) {
        $err['sdt'] = "Số điện thoại không hợp lệ";
    }
    if (empty($sdt)) {
        $err['sdt'] = "Bạn chưa nhập SĐT";
    }

    if (empty($diachi)) {
        $err['diachi'] = "Bạn chưa nhập địa chỉ";
    }
    if (empty($matkhau)) {
        $err['matkhau'] = "Bạn chưa nhập mật khẩu";
    }
    if (empty($rmatkhau)) {
        $err['rmatkhau'] = "Nhập lại mật khẩu";
    }
    if ($matkhau != $rmatkhau) {
        $err['rmatkhau'] = "Mật khẩu không trùng khớp";
    }


    if (empty($err)) {
        $mk = password_hash($matkhau, PASSWORD_DEFAULT);
        $sql = "insert into nguoidung (TenND,Email,SDT,DiaChi,MatKhau) values ('$ten','$email','$sdt','$diachi','$mk')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            header('location: index.php');
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="css/sticky-footer.css" rel=" stylesheet">
    <link href="css/font-awesome.min.css" rel=" stylesheet">
    <link href="css/animate.css" rel=" stylesheet">

    <script src="https://kit.fontawesome.com/fa204eeff7.js" crossorigin="anonymous"></script>


    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <style>
        .err {
            color: red;
        }
    </style>
</head>

<body>
    <?php include('../partials/navbar.php') ?>
    <br>
    <div class="container-fluid row">
        <div class="col-4"></div>
        <img src="../lh_loading.gif" alt="" width="80px" height="80px" class="mt-1"> 
        <h2 class="text-center text-success mt-4 ml-2">  Đang Liên Hệ ....</h2>
    </div>
    <br>
    <?php include('../partials/footer.php') ?>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>