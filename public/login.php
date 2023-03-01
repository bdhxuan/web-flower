<?php

include('../partials/connect.php.');

$err = [];
if (isset($_POST['Email'])) {
    $email = $_POST['Email'];
    $matkhau = $_POST['MatKhau'];

    $sql = "select * from chitietnd where Email='$email'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);
    $checkEmail = mysqli_num_rows($query);

    if ($checkEmail == 1) {
        $check = password_verify($matkhau, $data['MatKhau']);
        if ($check) {
            $_SESSION['user'] = $data;
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
                header('location: ' . $action . '.php');
            } else {
                header('location: index.php');
            }
        } else {
            $err['matkhau'] = "Sai mat khau";
        }
    } else {
        $err['email'] = "Email không tồn tại";
    }
    if (empty($email)) {
        $err['email'] = "Ban chua nhap email";
    }
    if (empty($matkhau)) {
        $err['matkhau'] = "Ban chua nhap mat khau";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng Nhập</title>
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
            <div class=" text-center">
                <h2 class="text-uppercase font-weight-bold" style="color:palevioletred"> Đăng Nhập</h2>
            </div>
            <div class="card-body">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="usernameInput">
                            Email
                        </label>
                        <input type="email" name="Email" id="usernameInput" class="form-control" placeholder="Nhập tên Email">
                        <span class="err"><?php echo isset($err['email']) ? $err['email'] : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="passwordInput">
                            Mật khẩu:
                        </label>
                        <input type="password" name="MatKhau" id="passwordInput" class="form-control" placeholder="Nhập mật khẩu">
                        <span class="err"><?php echo isset($err['matkhau']) ? $err['matkhau'] : '' ?></span>
                    </div>
                    <br>
                    <div class="d-flex">
                        <div class="pr-5 form-group form-check ">
                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label"> Ghi nhớ tôi</label>
                        </div>
                        <div class="pr-5"></div>
                        <div class="pr-5"></div>
                        <div class="pr-5"></div>
                        <div class="pr-1"></div>
                        <div class="pr-4">
                            <a href="#" style="float: right;">Quên mật khẩu?</a>
                        </div>
                    </div>
                    <br>
                    <button class="p btn btn-success btn-block justify-content-end" style="font-size: 20px;">
                        Đăng Nhập
                    </button>
                    <hr>
                    <strong>Bạn chưa có tài khoản?</strong> <a href="dangky.php">Đăng Ký Ngay</a>
                    <br>
                </form>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    <br><br>
    <?php include('../partials/footer.php') ?>

</body>

</html>