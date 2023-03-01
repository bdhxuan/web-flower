<?php

include('../partials/connect.php.');

$donhang = mysqli_query($conn, "select * from donhang");

$nguoidung = mysqli_query($conn, "select * from chitietnd ");
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

$stt = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quản lý đơn hàng</title>

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
                <a href="nv_donhang.php" class="active btn">Quản Lý Đơn Hàng</a>
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




    <div class="container-fluid">
        <br><br><br><br><br>
        <div class="inner-wrapper row col-12">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-sm navbar-dark" style="margin-bottom: 30px; float:right">
                    <form class="form-inline" method="GET" action="search_donhang.php">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search..." name="keyword">
                        <button class="btn btn-success" name="search" type="submit"><i class="fas fa-search" id="search-icon"></i></button>
                    </form>
                </nav>
            </div>
            <div class="col-1"></div>
            <div class="col-10">
                <table id="contacts" class="table table-bordered  table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Tên người mua</th>
                            <th>Tên người nhận</th>
                            <th>Địa chỉ nhận</th>
                            <th>SDT người nhận</th>
                            <th>Thành tiền</th>
                            <th>Trạng Thái</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donhang as $key => $value) : ?>
                            <tr>
                                <td><?php echo $stt++ ?></td>

                                <td><?php echo $value['id_DH'] ?></td>

                                <?php foreach ($nguoidung as $key => $value1) :
                                    if ($value['id_ND'] == $value1['id_ND']) { ?>
                                        <td><?php echo $value1['TenND'] ?></td>
                                    <?php } ?>
                                <?php endforeach ?>
                                <td><?php echo $value['TenND2'] ?></td>

                                <td><?php echo $value['DiaChi2'] ?></td>

                                <td><?php echo $value['SDT2'] ?></td>

                                <td><?php echo $value['TongTien'] ?></td>
                                <?php if ($value['TTDH'] == 0) { ?>
                                    <td><a href="nv_dh_xacnhan.php?id_DH=<?php echo $value['id_DH'] ?>" class="btn btn-info" title="sua">Xác Nhận</a></td>
                                <?php } else { ?>
                                    <td><a href="ok.php?id_DH= <?php echo $value['id_DH'] ?>" class="btn btn-danger" title="xoa">Đã xác nhận</a></td>
                                <?php } ?>
                                <td><a href="nv_dh_huy.php?id_DH= <?php echo $value['id_DH'] ?>" class="btn  btn-primary" title="xoa">Hủy</a></td>
                                <td><a href="nv_dh_chitiet.php?id_DH=<?php echo $value['id_DH'] ?>" class="btn  btn-success" title="xoa">Chi Tiết</a></td>


                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="col-1"></div>
        </div>
    </div>


</body>

</html>