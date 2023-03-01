<?php

include('../partials/connect.php.');
include('./sum_money.php');

$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
if (isset($_GET['id_DH'])) {


    $donhang = mysqli_query($conn, "select * from donhang where id_DH=" . $_GET['id_DH']);
    $dh = mysqli_fetch_assoc($donhang);
    $id_ND = $dh['id_ND'];

    $nguoidung = mysqli_query($conn, "select * from chitietnd where id_ND=" . $id_ND);
    $ng = mysqli_fetch_assoc($nguoidung);

    $chitiet = mysqli_query($conn, "select * from dh_chitiet where id_DH=" . $_GET['id_DH']);

    $sanpham = mysqli_query($conn, "select * from sanpham");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đơn Hàng Chi Tiết</title>
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


    <hr>
    <br><br><br>
    <div class="container-fluid row mt-5">
        <div class="col-3 ml-5">
            <h2 class="text-center text-danger text-uppercase h-color">Thông Tin Người Mua</h2>
            <br>
            <div class="form-group" hidden>
                <label for="usernameInput">ID Khách Hàng:</label>
                <input type="text" name="id_ND" id="usernameInput" class="form-control" readonly value="<?php echo $ng['id_ND'] ?>">
            </div>
            <div class="form-group">
                <label for="usernameInput">Họ Tên:</label>
                <input type="text" name="TenND" id="usernameInput" class="form-control" readonly value="<?php echo $ng['TenND'] ?>">
                <span class="err"><?php echo isset($err['ten']) ? $err['ten'] : '' ?></span>
            </div>
            <div class="form-group">
                <label for="usernameInput">SĐT:</label>
                <input type="phone" name="SDT" id="usernameInput" class="form-control" readonly value="<?php echo $ng['SDT'] ?>">
                <span class="err"><?php echo isset($err['sdt']) ? $err['sdt'] : '' ?></span>
            </div>
            <div class="form-group">
                <label for="usernameInput">Địa Chỉ:</label>
                <input type="text" name="DiaChi" id="usernameInput" class="form-control" readonly value="<?php echo $ng['DiaChi'] ?>">
                <span class="err"><?php echo isset($err['diachi']) ? $err['diachi'] : '' ?></span>
            </div>
            <div class="form-group">
                <label for="usernameInput">Lưu ý cho người bán:</label>
                <input type="text" class="form-control" id="usernameInput" readonly value="<?php echo $dh['LuuY'] ?> ">
            </div>

        </div>

        <div class="col-3 mr-4 ml-3 mt-1">
            <h3 class="text-center text-danger text-uppercase h-color">Thông Tin Người Nhận</h3>
            <br>
            <div class="form-group">
                <label for="usernameInput">
                    Họ Tên:
                </label>
                <input type="text" name="TenND2" id="usernameInput" class="form-control" readonly value="<?php echo $dh['TenND2'] ?>" placeholder="Nhập tên người dùng">
                <span class="err"><?php echo isset($err['ten2']) ? $err['ten2'] : '' ?></span>
            </div>
            <div class="form-group">
                <label for="usernameInput">
                    Số Điện Thoại:
                </label>
                <input type="phone" name="SDT2" id="usernameInput" class="form-control" readonly value="<?php echo $dh['SDT2'] ?>" placeholder="Nhập tên Số Điện Thoại">
                <span class="err"><?php echo isset($err['sdt2']) ? $err['sdt2'] : '' ?></span>
            </div>

            <div class="form-group">
                <label for="usernameInput">
                    Địa Chỉ Cụ Thể:
                </label>
                <input type="text" name="DiaChi2" id="usernameInput" class="form-control" readonly value="<?php echo $dh['DiaChi2'] ?>" placeholder="Nhập tên Địa Chỉ">
                <span class="err"><?php echo isset($err['diachi2']) ? $err['diachi2'] : '' ?></span>
            </div>
            <div class="form-group">
                <label for="usernameInput">Lời chúc:</label>
                <input type="text" class="form-control" id="usernameInput" readonly value="<?php echo $dh['LoiChuc'] ?> ">
            </div>
        </div>


        <div class="col-5">
            <h2 class="text-center text-danger text-uppercase h-color mt-1">Thông Tin Đơn Hàng</h2>
            <br>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Hình Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($chitiet as $key => $value) :
                        foreach ($sanpham as $key => $value1) :
                            if ($value1['id'] == $value['id_SP']) { ?>
                                <tr>
                                    <td id="HinhAnh"><img src="images/<?php echo $value1['HinhAnh'] ?>" width="50px" height="50px"></td>
                                    <td id="TenSP"><?php echo $value1['TenSP'] ?></td>
                                    <td id="SoLuong"><?php echo $value['SoLuong'] ?></td>
                                    <td id="Gia"><?php echo $value1['Gia'] ?></td>
                                    <?php $t = $value1['Gia'] * $value['SoLuong'] ?>
                                    <td><?php echo $t ?></td>
                                </tr>
                            <?php } ?>
                        <?php endforeach ?>
                    <?php endforeach ?>

                </tbody>

            </table>
            <br>
            <div class="mt-2 d-flex col-12">
                <fieldset class="col-6">
                    <legend class="text-success text-center fw-bold">Phương thức thanh toán :</legend>
                    <div class="form-group ml-4" style="font-size: 20px;">
                        <?php if ($dh['PTTT'] == 1) { ?>
                            <p>Chuyển khoản</p>
                        <?php } else { ?>
                            <p>Thanh toán khi nhận hàng</p>
                        <?php } ?>
                    </div>
                </fieldset>
                <fieldset class="ml-5 col-6">
                    <legend class="text-success text-center fw-bold">Phương thức giao hàng :</legend>
                    <div class="form-group ml-5" style="font-size: 20px;">
                        <?php if ($dh['PTGH'] == 0) { ?>
                            <p> Giao hàng nhanh</p>
                        <?php } else { ?>
                            <p> Giao hàng tiết kiệm</p>
                        <?php } ?>


                    </div>
            </div>
            </fieldset>
        </div>
    </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    </script>

    </div>
    <br>

    <?php include('../partials/footer.php') ?>


</body>

</html>