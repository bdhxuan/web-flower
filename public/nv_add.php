<?php

include('../partials/connect.php.');

$chucvu = mysqli_query($conn, "select * from chucvu");
$ng = mysqli_query($conn, "select * from chitietnd");
$tv = mysqli_query($conn, "select * from thanhvien");

$err = [];
if (isset($_POST['MaNV'])) {

    $manv = $_POST['MaNV'];
    $tennv = $_POST['TenNV'];
    $chucvu = $_POST['ChucVu'];
    $sdt = $_POST['SDT'];
    $diachi = $_POST['DiaChi'];
    $email = $_POST['Email'];
    $matkhau = $_POST['MatKhau'];
    $rmatkhau = $_POST['rMatKhau'];

    // if (empty($manv)) {
    //     $err['manv'] = "Bạn chưa nhập mã nhân viên ";
    // }
    // if (!empty($manv)) {
    //     foreach ($tv as $key => $value) : {
    //             if (strlen(strstr($value['MaNV'], $manv)) > 0) {
    //                 $err['manv'] = "Mã nhân viên này đã tồn tại";
    //             }
    //         }
    //     endforeach;
    // }
    // if (empty($tennv)) {
    //     $err['tennv'] = "Bạn chưa nhập tên nhân viên ";
    // }
    // if (empty($chucvu) || ($chucvu) == -1) {
    //     $err['chucvu'] = "Bạn chưa chọn chức vụ nhân viên ";
    // }
    // if (strlen($sdt) != 10) {
    //     $err['sdt'] = "Số điện thoại không hợp lệ";
    // }
    // if (empty($sdt)) {
    //     $err['sdt'] = "Bạn chưa nhập SĐT";
    // }
    // if (empty($email)) {
    //     $err['email'] = "Bạn chưa nhập email nhân viên ";
    // }
    // if (!empty($email)) {
    //     foreach ($ng as $key => $value) : {
    //             if (strlen(strstr($value['Email'], $email)) > 0) {
    //                 $err['email'] = "Email này đã tồn tại";
    //             }
    //         }
    //     endforeach;
    // }

    // if (empty($matkhau)) {
    //     $err['matkhau'] = "Bạn chưa nhập mật khẩu";
    // }
    // if (empty($rmatkhau)) {
    //     $err['rmatkhau'] = "Bạn chưa nhập lại mật khẩu";
    // }
    // if ($matkhau != $rmatkhau) {
    //     $err['rmatkhau'] = "Mật khẩu không khớp";
    // }
    // if (empty($err)) {
        $mk = password_hash($matkhau, PASSWORD_DEFAULT);
        $sql = "insert into chitietnd (TenND,Email,SDT,DiaChi,MatKhau) values ('$tennv','$email','$sdt','$diachi','$mk')";
        $query = mysqli_query($conn, $sql);
        $id_TT = mysqli_insert_id($conn);
        if ($query) {
            $sql  = "insert into thanhvien (`MaNV`, `ChucVu`, `id_TT`) values ('$manv', '$chucvu','$id_TT')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                header('location: nv_thanhvien.php');
            } else {
                echo 'Lỗi';
            }
        }
    // }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thêm Nhân Viên</title>

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

    <header>
        <div class="row">
            <a href="index.php" class="nav-link logo"><i class="fa-solid fa-fan"></i>Flower Store</a>
            <nav class="navbar">
                <a class=" btn" href="index.php">Trang Chủ</a>
                <div class="dropdown ">
                    <a href="#" class="btn dropdown-toggle" data-toggle="dropdown">
                        Quản Lý Sản Phẩm
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item " href="nv_sanpham.php">Danh sách sản phẩm</a>
                        <a class="dropdown-item" href="nv_loaihoa.php">Danh sách loại sản phẩm</a>
                    </div>
                </div>
                <!-- <a href="nv_sanpham.php" class="btn  active">Quản Lý Sản Phẩm</a> -->
                <a href="nv_donhang.php" class=" btn">Quản Lý Đơn Hàng</a>
                <div class="dropdown ">
                    <a href="sanphamall.php" class="btn dropdown-toggle active" data-toggle="dropdown">
                        Quản Lý Tài Khoản
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item " href="nv_thanhvien.php">Quản lý thành viên</a>
                        <a class="dropdown-item" href="nv_nguoidung.php">Quản lý người dùng</a>
                    </div>
                </div>
            </nav>
            <div class="icons mt-3">
                <i class="fa-solid fa-user" data-toggle="dropdown"></i>
                <div class="dropdown-menu">
                    <?php if (isset($user['Email'])) { ?>
                        <div class="dropdown-item"><i class="fas fa-check-circle"></i> <?php echo $user['TenND'] ?></div>
                        <a class="dropdown-item" href="logout.php?id"><i class="fas fa-sign-in-alt"></i> Đăng Xuất</a>
                    <?php } else { ?>
                        <a class="dropdown-item" href="login.php?id"><i class="fas fa-sign-in-alt"></i> Đăng nhập </a>
                        <a class="dropdown-item" href="dangky.php?id "><i class="fas fa-check-circle"></i> Đăng ký</a>

                    <?php } ?>
                </div>

            </div>
        </div>

    </header>
    <br><br><br><br>
    <div class="container-fluid row">
        <div class="col-3"></div>
        <div class="card col-6">
            <div class="text-uppercase text-center ">
                <br>
                <h2 class="font-weight-bold" style="color:palevioletred; font-size:40px">Thêm Thành Viên</h2>
            </div>
            <div class="card-body">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="name">Mã nhân viên</label>
                        <input type="text" name="MaNV" class="form-control" maxlen="255" id="name" placeholder="Nhập mã người dùng" value="" />
                        <span class="err"><?php echo isset($err['manv']) ? $err['manv'] : '' ?></span>

                    </div>

                    <div class="form-group">
                        <label for="name">Tên nhân viên</label>
                        <input type="text" name="TenNV" class="form-control" maxlen="255" id="name" placeholder="Nhập tên người dùng" value="" />
                        <span class="err"><?php echo isset($err['tennv']) ? $err['tennv'] : '' ?></span>

                    </div>


                    <div class="form-group">
                        <label for="">Chức Vụ</label>
                        <select name="ChucVu" id="">
                            <option value="-1">---Chọn--</option>
                            <?php foreach ($chucvu as $key => $value) {  ?>
                                <option value="<?php echo $value['idcv'] ?>"><?php echo $value['TenCV'] ?></option>
                            <?php } ?>

                            <span class="err"><?php echo isset($err['chucvu']) ? $err['chucvu'] : '' ?></span>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Số điện thoại</label>
                        <input type="text" name="SDT" class="form-control" maxlen="255" id="name" placeholder="Nhập sô điện thoại" value="" />
                        <span class="err"><?php echo isset($err['sdt']) ? $err['sdt'] : '' ?></span>

                    </div>
                    <div class="form-group">
                        <label for="name">Địa chỉ</label>
                        <input type="text" name="DiaChi" class="form-control" maxlen="255" id="name" placeholder="Nhập địa chỉ" value="" />
                        <span class="err"><?php echo isset($err['diachi']) ? $err['diachi'] : '' ?></span>

                    </div>
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
                    <div class="form-group">
                        <label for="passwordInput">
                            Mật khẩu:
                        </label>
                        <input type="password" name="rMatKhau" id="passwordInput" class="form-control" placeholder="Nhập lại mật khẩu">
                        <span class="err"><?php echo isset($err['rmatkhau']) ? $err['rmatkhau'] : '' ?></span>
                    </div>

                    <button type="submit" name="submit" id="submit" class="btn btn-success btn-block text-uppercase" style="font-size: 20px;">Lưu Thông Tin</button>
                </form>
            </div>
        </div>

</body>

</html>