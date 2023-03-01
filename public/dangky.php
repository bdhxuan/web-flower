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
        $sql = "insert into chitietnd (TenND,Email,SDT,DiaChi,MatKhau) values ('$ten','$email','$sdt','$diachi','$mk')";
        $query = mysqli_query($conn, $sql);
        $id_TT = mysqli_insert_id($conn);
        if ($query) {
            $sql = "insert into nguoidung (id_TT) values ('$id_TT')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                header('location: index.php');
            } else {
                echo 'Lỗi';
            }
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
        <div class="card col-4">
            <br>
            <div class="text-center">
                <h2 class="text-uppercase font-weight-bold" style="color:palevioletred">Đăng Ký Tài Khoản</h2>
            </div>
            <br>
            <div class="card-body">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="usernameInput">
                            Họ và Tên:
                        </label>
                        <input type="text" name="TenND" id="usernameInput" class="form-control" placeholder="Nhập tên người dùng">
                        <span class="err"><?php echo isset($err['ten']) ? $err['ten'] : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="usernameInput">
                            Email
                        </label>
                        <input type="email" name="Email" id="usernameInput" class="form-control" placeholder="Nhập tên Email">
                        <span class="err"><?php echo isset($err['email']) ? $err['email'] : '' ?></span>
                    </div>

                    <div class="form-group">
                        <label for="usernameInput">
                            Số Điện Thoại
                        </label>
                        <input type="phone" name="SDT" id="usernameInput" class="form-control" placeholder="Nhập tên Số Điện Thoại">
                        <span class="err"><?php echo isset($err['sdt']) ? $err['sdt'] : '' ?></span>
                    </div>

                    <div class="form-group">
                        <label for="usernameInput">
                            Địa Chỉ Cụ Thể:
                        </label>
                        <input type="text" name="DiaChi" id="usernameInput" class="form-control" placeholder="Nhập tên Địa Chỉ">
                        <span class="err"><?php echo isset($err['diachi']) ? $err['diachi'] : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="passwordInput">
                            Mật khẩu:
                        </label>
                        <input type="password" name="MatKhau" id="passwordInput" class="form-control" placeholder="Nhập mật khẩu">
                        <span class="err"><?php echo isset($err['matkhau']) ? $err['matkhau'] : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="kh">
                            Mật khẩu:
                        </label>
                        <input type="password" name="rMatKhau" id="kh" class="form-control" placeholder="Nhập lại mật khẩu">
                        <span class="err"><?php echo isset($err['rmatkhau']) ? $err['rmatkhau'] : '' ?></span>
                    </div>
                    <br>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label"> Ghi nhớ tôi</label>
                    </div>
                    <br>
                    <button onclick="return confirm ('Đăng ký tài khoản thành công!') " class="btn btn-success btn-block" style="font-size: 20px;">
                        Đăng Ký
                    </button>
                </form>
            </div>
            <br>
        </div>
    </div>
    <br>
    <?php include('../partials/footer.php') ?>

</body>

</html>