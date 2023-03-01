<?php

include('../partials/connect.php.');

$chucvu = mysqli_query($conn, "select * from chucvu");

// $query = "select * from chitietnd c join thanhvien t where c.id_ND = t.id_TT";

// $result = mysqli_query($conn, $query);
// $err = [];

// var_dump($result);
// die();
if (isset($_GET['id'])) {

    $id = trim($_GET['id']);
    $data = mysqli_query($conn, "select * from chitietnd c join thanhvien t on c.id_ND = t.id_TT where id = '$id'");

    $nv = mysqli_fetch_assoc($data);
}

if (isset($_POST['MaNV'])) {

    $manv = $_POST['MaNV'];
    $tennv = $_POST['TenNV'];
    $chucvu = $_POST['ChucVu'];
    $sdt = $_POST['SDT'];
    $email = $_POST['Email'];
    $id_TT = $_POST['id_TT'];

    if (empty($manv)) {
        $err['manv'] = "Bạn chưa nhập mã nhân viên ";
    }
    if (empty($tennv)) {
        $err['tennv'] = "Bạn chưa nhập tên nhân viên ";
    }
    if (strlen($sdt) != 10) {
        $err['sdt'] = "Số điện thoại không hợp lệ";
    }
    if (empty($sdt)) {
        $err['sdt'] = "Bạn chưa nhập SĐT";
    }

    if (empty($chucvu)) {
        $err['chucvu'] = "Bạn chưa chọn chức vụ nhân viên ";
    }
    
    if (empty($email)) {
        $err['email'] = "Bạn chưa nhập email nhân viên ";
    }

    if (empty($err)) {

        $sql  = "update chitietnd set TenND='$tennv',Email='$email',SDT='$sdt' where id_ND=$id_TT";
        $query = mysqli_query($conn, $sql);
        $sql  = "update thanhvien set MaNV='$manv',  ChucVu='$chucvu' where id=$id";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            header('location: nv_thanhvien.php');
        } else {
            echo 'loi';
        }
    }
}
?>
<style>
    .err {
        color: red;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contacts</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="css/sticky-footer.css" rel=" stylesheet">
    <link href="css/font-awesome.min.css" rel=" stylesheet">
    <link href="css/animate.css" rel=" stylesheet">


    <link rel="stylesheet" href="./css/all.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->


    <script src="https://kit.fontawesome.com/fa204eeff7.js" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/min_max.css"> -->

    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
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
    <br><br><br> <br><br><br>
    <div class=" container-fluid row">
        <div class="col-4"></div>
        <div class="card col-4">
            <br>
            <div class="text-uppercase text-center ">
                <h2 class="font-weight-bold" style="color:palevioletred; font-size:40px">
                    Sửa Thành Viên
                </h2>
            </div>
            <form name="frm" id="frm" action="" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="name">Mã nhân viên</label>
                    <input type="text" name="MaNV" class="form-control" maxlen="255" id="name" value="<?php echo $nv['MaNV'] ?>" />
                    <span class="err"><?php echo isset($err['manv']) ? $err['manv'] : '' ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Tên nhân viên</label>
                    <input type="text" name="TenNV" class="form-control" maxlen="255" id="name" placeholder="Nhập tên sản phẩm" value="<?php echo $nv['TenND'] ?>" />
                    <span class="err"><?php echo isset($err['tennv']) ? $err['tennv'] : '' ?></span>

                </div>
                <div class="form-group">
                    <label for="phone">Chuc Vu</label>
                    <select name="ChucVu" id="">

                        <?php foreach ($chucvu as $key => $value) { ?>

                            <?php if ($nv['ChucVu'] == $value['idcv']) { ?>
                                <option value="<?php echo $value['idcv'] ?>"><?php echo $value['TenCV'] ?></option>
                            <?php } ?>

                        <?php } ?>
                        <?php foreach ($chucvu as $key => $value) { ?>

                            <?php if ($nv['ChucVu'] != $value['idcv']) { ?>
                                <option value="<?php echo $value['idcv'] ?>"><?php echo $value['TenCV'] ?></option>
                            <?php } ?>

                        <?php } ?>

                    </select>

                </div>
        
                <div class="form-group">
                    <label for="name">Số điện thoại</label>
                    <input type="text" name="SDT" class="form-control" maxlen="255" id="name" placeholder="Nhập tên sản phẩm" value="<?php echo $nv['SDT'] ?>" />
                    <span class="err"><?php echo isset($err['sdt']) ? $err['sdt'] : '' ?></span>
                    <input type="text" name="id_TT" class="form-control" maxlen="255" id="name" placeholder="" hidden  value="<?php echo $nv['id_TT'] ?>" />

                </div>
                <div class="form-group">
                    <label for="usernameInput">
                        Email
                    </label>
                    <input type="email" name="Email" id="usernameInput" class="form-control" placeholder="Nhập tên Email" value="<?php echo $nv['Email'] ?>">
                    <span class="err"><?php echo isset($err['email']) ? $err['email'] : '' ?></span>
                </div>
             
                <button type="submit" name="submit" id="submit" class="btn btn-success btn-block text-uppercase" style="font-size: 17px;">Cập Nhật</button>
            </form>
            <br>
        </div>
      
    </div>





    <script src="js/wow.min.js"></script>
    <script>
        $(document).ready(function() {
            new WOW().init();
            $('#contacts').DataTable();
        });
    </script>

</body>

</html>