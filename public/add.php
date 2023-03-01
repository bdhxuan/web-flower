<?php

use Vtiful\Kernel\Format;

include('../partials/connect.php.');

$sanpham = mysqli_query($conn, "select * from sanpham");

$loaihoa = mysqli_query($conn, "select * from loaihoa");
$err = [];
if (isset($_POST['idMaSP'])) {
    // echo "<pre>";
    // print_r($_POST);
    $idma = $_POST['idMaSP'];
    $tensp = $_POST['TenSP'];
    $soluong = $_POST['SoLuong'];
    // $gia = isset$_POST['Gia'])? number_format("$_POST[Gia]", 3, ".", "."):[];
    $gia =  $_POST['Gia'];
    $giagiam =  $_POST['GiaGiam'];

    $idloai = $_POST['idLoai'];
    $spm = $_POST['spMoi'];
    $chitiet = $_POST['ChiTiet'];

    if (empty($idma)) {
        $err['idma'] = "Bạn chưa nhập mã sản phẩm";
    }
    if (empty($tensp)) {
        $err['tensp'] = "Bạn chưa nhập tên sản phẩm";
    }
    if (!empty($idma)) {
        foreach ($sanpham as $key => $value) : {
                if ($idma == $value['idMaSP']) {
                    $err['idma'] = "Mã sản phẩm đã tồn tại";
                }
            }
        endforeach;
    }

    if (empty($soluong)) {
        $err['soluong'] = "Bạn chưa nhập số lượng sản phẩm";
    }
    if (empty($gia)) {
        $err['gia'] = "Bạn chưa nhập giá sản phẩm";
    }

    if (empty($idloai) || ($idloai == -1)) {
        $err['idloai'] = "Bạn chưa chọn loại sản phẩm";
    }


    if (isset($_FILES['HinhAnh'])) {
        $file = $_FILES['HinhAnh'];
        $file_name = $file['name'];

        move_uploaded_file($file['tmp_name'], 'images/' . $file_name);
    }
    if (empty($file_name)) {
        $err['file_name'] = "Bạn chưa chọn ảnh sản phẩm";
    }
    if (empty($err)) {
        $sql  = "insert into sanpham (`idMaSP`, `TenSP`, `SoLuong`, `Gia`, `GiaGiam`, `idLoai`,`spMoi`,`ChiTiet`, `HinhAnh`) values ('$idma', ' $tensp', '$soluong', '$gia', '$giagiam','$idloai','$spm' ,'$chitiet', '$file_name')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            header('location: nv_sanpham.php');
        } else {
            echo 'Lỗi';
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

    <title>Thêm Sản Phẩm</title>

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
                    <a href="#" class="btn dropdown-toggle active" data-toggle="dropdown">
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
                    <a href="sanphamall.php" class="btn dropdown-toggle " data-toggle="dropdown">
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
    <br> <br> <br> <br>
    <div class="container-fluid row">
        <div class="col-3"></div>
        <div class="card col-6">
            <br>
            <div class="text-uppercase text-center ">
                <h2 class="font-weight-bold" style="color:palevioletred; font-size:40px">
                    Thêm Sản Phẩm
                </h2>
            </div>
            <div class="card-body ">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="name">Mã sản phẩm:</label>
                        <input type="text" name="idMaSP" class="form-control" maxlen="255" id="name" placeholder="Nhập mã sản phẩm" value="" />
                        <span class="err"><?php echo isset($err['idma']) ? $err['idma'] : '' ?></span>

                    </div>
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Tên sản phẩm:</label>
                        <input type="text" name="TenSP" class="form-control" maxlen="255" id="name" placeholder="Nhập tên sản phẩm" value="" />
                        <span class="err"><?php echo isset($err['tensp']) ? $err['tensp'] : '' ?></span>

                    </div>
                    <!-- Phone -->
                    <div class="form-group">
                        <label for="phone">Số lượng:</label>
                        <input type="text" name="SoLuong" class="form-control" maxlen="255" id="phone" placeholder="Nhập số lượng" value="" />
                        <span class="err"><?php echo isset($err['soluong']) ? $err['soluong'] : '' ?></span>

                    </div>
                    <!-- Giá -->
                    <div class="form-group">
                        <label for="phone">Giá:</label>
                        <input type="text" name="Gia" class="form-control" maxlen="255" placeholder="Nhập giá sản phẩm" value="" />
                        <span class="err"><?php echo isset($err['gia']) ? $err['gia'] : '' ?></span>

                    </div>
                    <div class="form-group">
                        <label for="phone">Giá Giảm:</label>
                        <input type="text" name="GiaGiam" class="form-control" maxlen="255" placeholder="Giảm còn bao nhiêu" value="0" />


                    </div>
                    <div class="form-group">
                        <label for="">Loai Hoa:</label>
                        <select name="idLoai" id="">
                            <option value="-1">---Chọn--</option>
                            <?php foreach ($loaihoa as $key => $value) { ?>
                                <option value="<?php echo $value['idLoai'] ?>"><?php echo $value['TenLoai'] ?></option>
                            <?php } ?>

                        </select>
                        <span class="err"><?php echo isset($err['idloai']) ? $err['idloai'] : '' ?></span>

                    </div>
                    <div class="form-group">
                        <label for="phone">Sản Phẩm Mới:&nbsp;&nbsp;&nbsp;</label>
                        <input type="radio" value="1" name="spMoi" checked="checked"> Có
                        <input type="radio" value="0" name="spMoi"> Không

                    </div>
                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Chi tiết sản phẩm: </label>
                        <textarea name="ChiTiet" id="notes" class="form-control" placeholder=""></textarea>


                    </div>
                    <div class="form-group">
                        <label for="description">Hình ảnh:</label>
                        <input type="file" name="HinhAnh" class="form-control" value="" />
                        <span class="err"><?php echo isset($err['file_name']) ? $err['file_name'] : '' ?></span>


                    </div>

                    <!-- Submit -->
                    <button type="submit" name="submit" id="submit" class="btn btn-success btn-block text-uppercase" style="font-size: 20px;">Thêm sản phẩm</button>
                </form>

            </div>

        </div>

</body>

</html>