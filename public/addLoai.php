<?php

include('../partials/connect.php.');

$loaihoa = mysqli_query($conn, "select * from loaihoa");

$err = [];
if (isset($_POST['idLoai'])) {
    $idloai = $_POST['idLoai'];
    $tenloai = $_POST['TenLoai'];
    if (!empty($idloai)) {
        foreach ($loaihoa as $key => $value) : {
                if ($idloai == $value['idLoai']) {
                    $err['idloai'] = "Mã loại đã tồn tại";
                }
            }
        endforeach;
    }
    if (!empty($tenloai)) {
        foreach ($loaihoa as $key => $value) : {
                if (strlen(strstr($value['TenLoai'], $tenloai)) > 0) {
                    $err['TenLoai'] = "Tên loại đã tồn tại";
                }
            }
        endforeach;
    }
    if (empty($err)) {
        $sql  = "insert into LoaiHoa (`idLoai`, `TenLoai`) values ('$idloai', ' $tenloai')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            header('location: nv_sanpham.php');
        } else {
            echo 'loi';
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

    <title>Thêm Loại Sản Phẩm</title>

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
    <br><br><br><br><br>
    <div class=" container-fluid row col-12">
        <div class="col-4"></div>
        <div class="card col-4">
            <br>
            <div class="text-center ">
                <h2 class="text-uppercase font-weight-bold" style="color:palevioletred">Thêm loại hoa</h2>
            </div>
            <div class="card-body">
                <form name="frm" id="frm" action="" enctype="multipart/form-data" method="post" class="col-md-12 col-md-offset-3">
                    <div class="form-group">
                        <label for="name">Mã Loại: </label>
                        <input type="text" name="idLoai" class="form-control" maxlen="255" id="name" placeholder="Nhập mã sản phẩm" value="" />
                        <span class="err"><?php echo isset($err['idloai']) ? $err['idloai'] : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên Loại: </label>
                        <input type="text" name="TenLoai" class="form-control" maxlen="255" id="name" placeholder="Nhập tên sản phẩm" value="" />
                        <span class="err"><?php echo isset($err['TenLoai']) ? $err['TenLoai'] : '' ?></span>
                    </div>
                    <br>
                    <button type="submit" name="submit" id="submit" class="btn btn-success btn-block text-uppercase">Thêm Loại</button>
                    <br>
                </form>
            </div>
            <br>
        </div>
        <div class="col-4"></div>
    </div>
    <br>

</body>

</html>