<?php

include('../partials/connect.php.');
include('./sum_money.php');

$stt = 1;
if (isset($_GET['id_ND'])) {
    $donhang = mysqli_query($conn, "select * from donhang where id_ND=" . $_GET['id_ND']);
    $dh = mysqli_fetch_assoc($donhang);
    $id_DH = $dh['id_DH']; // lay id nguoi dung de hien thi ra

    // $nguoidung = mysqli_query($conn, "select * from nguoidung where id_ND=" . $id_ND);
    // $ng = mysqli_fetch_assoc($nguoidung);

    $chitiet = mysqli_query($conn, "select * from dh_chitiet");

    $sanpham = mysqli_query($conn, "select * from sanpham");

    $err = [];
    $id_DH1 = $dh['TongTien']; // lay id nguoi dung de hien thi ra


}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <title>Contacts</title> -->
    <title>Thanh Toán</title>
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
    <style>
        .err {
            color: red;
        }
    </style>
</head>

<body>

    <?php include('../partials/navbar.php') ?>

    <?php if (isset($_SESSION['user'])) { ?>
        <div class="main">

            <?php foreach ($donhang as $key => $value2) : ?>
                <div class="container-fluid row ml-5">
                    <div class="col-md-11 mt-3">
                        <h3 class=" text-uppercase text-danger" style="margin-bottom: 20px; float: right;">Ngày Đặt: <?php echo $value2['NgayDat'] ?></h3>
                        <h3 class="text-uppercase text-danger" style="margin-bottom: 20px;">Đơn hàng: <?php echo $stt++ ?></h3>

                    </div>
                    <ul class="list-group list-group-horizontal">
                        <!-- <li class=""> -->
                        <h5 class="text-success text-uppercase p-3">Trạng thái đơn hàng :</h5>
                        <!-- </li> -->
                        <?php if ($value2['TTDH'] == 1) { ?>
                            <h5 class="p-3 text-warning" value="">Đang được vận chuyển</h5>
                        <?php } else { ?>
                            <h5 class="p-3 text-warning" value="">Đang chờ xác nhận</h5>
                        <?php } ?>
                    </ul>
                </div>
                <br>

                <form action="" enctype="multipart/form-data" method="POST">
                    <div class="container-fluid row col-lg-12">
                        <div class="col-lg-1"></div>

                        <div class="col-lg-4">
                            <h2 class="text-center text-danger text-uppercase h-color">Thông Tin Người Nhận</h2>
                            <br>
                            <div class="form-group">
                                <label for="usernameInput">
                                    Họ và Tên:
                                </label>
                                <input type="text" name="TenND2" id="usernameInput" readonly class="form-control" value="<?php echo $value2['TenND2'] ?>" placeholder="Nhập tên người dùng">
                                <span class="err"><?php echo isset($err['ten2']) ? $err['ten2'] : '' ?></span>
                            </div>
                            <div class="form-group">
                                <label for="usernameInput">
                                    Số Điện Thoại:
                                </label>
                                <input type="phone" name="SDT2" id="usernameInput" readonly class="form-control" value="<?php echo $value2['SDT2'] ?>" placeholder="Nhập tên Số Điện Thoại">
                                <span class="err"><?php echo isset($err['sdt2']) ? $err['sdt2'] : '' ?></span>
                            </div>

                            <div class="form-group">
                                <label for="usernameInput">
                                    Địa Chỉ Cụ Thể:
                                </label>
                                <input type="text" name="DiaChi2" id="usernameInput" readonly class="form-control" value="<?php echo $value2['DiaChi2'] ?>" placeholder="Nhập tên Địa Chỉ">
                                <span class="err"><?php echo isset($err['diachi2']) ? $err['diachi2'] : '' ?></span>
                            </div>
                            <?php if ($value2['TTDH'] == 1) { ?>
                                <td><a href="#" class="btn  btn-primary" title="xoa" onclick="return confirm ('Đơn hàng đang được vận chuyển nên bạn không thực hiện được hủy đơn hàng ')">Hủy đơn hàng</a></td>
                            <?php } else { ?>
                                <td><a href="dh_huy.php?id_DH=<?php echo $value2['id_DH'] ?>" class="btn  btn-primary" title="xoa">Hủy đơn hàng</a></td>
                            <?php } ?>
                        </div>

                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <h2 class="text-center text-danger text-uppercase h-color">Thông Tin Đơn Hàng</h2>
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
                                        if ($value['id_DH'] == $value2['id_DH']) {
                                            foreach ($sanpham as $key => $value1) :
                                                if ($value1['id'] == $value['id_SP']) { ?>
                                                    <tr>
                                                        <td id="HinhAnh"><img src="images/<?php echo $value1['HinhAnh'] ?>" width="50px" height="50px"></td>
                                                        <td id="TenSP"><?php echo $value1['TenSP'] ?></td>
                                                        <td id="SoLuong"><?php echo $value['SoLuong'] ?></td>
                                                        <?php if ($value1['GiaGiam'] != 0) { ?>
                                                            <td id="Gia"><?php echo $value1['GiaGiam'] ?></td>
                                                        <?php } else { ?>
                                                            <td id="Gia"><?php echo $value1['Gia'] ?></td>
                                                        <?php } ?>

                                                        <?php if ($value1['GiaGiam'] != 0) { ?>
                                                            <?php $t = $value1['GiaGiam'] * $value['SoLuong'] ?>
                                                            <td><?php echo $t ?></td>
                                                        <?php } else { ?>
                                                            <?php $t = $value1['Gia'] * $value['SoLuong'] ?>
                                                            <td><?php echo $t ?></td>
                                                        <?php } ?>

                                                    </tr>
                                                <?php } ?>
                                            <?php endforeach ?>
                                        <?php } ?>
                                    <?php endforeach ?>

                                </tbody>

                            </table>
                            <br>
                            <table>
                                <tr>
                                    <td>
                                        <h3 class="text-uppercase ml-4">Tổng Cộng:&nbsp;&nbsp;&nbsp;</h3>
                                    </td>
                                    <td></td>
                                    <td>

                                        <h3><span><?php echo $value2['TongTien'] ?>đ</span></h3>
                                    </td>
                                </tr>
                            </table>
                            <div class="mt-2 d-flex col-12">
                                <fieldset class="col-6">
                                    <legend class="text-success text-center ">Phương thức thanh toán :</legend>
                                    <div class="form-group ml-1" style="font-size: 20px;">
                                        <?php if ($value2['PTTT'] == 1) { ?>
                                            <p>Chuyển khoản</p>
                                        <?php } else { ?>
                                            <p>Thanh toán khi nhận hàng</p>
                                        <?php } ?>
                                    </div>
                                </fieldset>
                                <fieldset class="ml-5 col-6">
                                    <legend class="text-success text-center ">Phương thức giao hàng :</legend>
                                    <div class="form-group ml-2" style="font-size: 20px;">
                                        <?php if ($value2['PTGH'] == 0) { ?>
                                            <p> Giao hàng nhanh</p>
                                        <?php } else { ?>
                                            <p> Giao hàng tiết kiệm</p>
                                        <?php } ?>


                                    </div>
                            </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>


                </form>
            <?php endforeach ?>
        </div>
        <hr><br>

    <?php } else { ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Vui lòng đăng nhập để tiếp tục...</strong> <a href="login.php?action=checkout">Đăng Nhập</a>
        </div>
    <?php } ?>


    <div class="toastt">
        <a href="#"><i class="icons fa-solid fa-angles-up text-danger" style="float: right; font-size:50px"></i></a>
        <br><br><br>
        <div class="toast" data-autohide="false">
            <div class="toast-body">

                <a href="tuvan.php">
                    <div class="spinner-grow text-info border-2"><i class="fa-solid fa-phone"></i></div>

                    <strong class="mr-auto text-primary text-capitalize">tư vấn trực tiếp</strong>

                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                </a>

            </div>
        </div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>

    <!-- end tu van truc tiep -->

    <br>

    <?php include('../partials/footer.php') ?>


</body>

</html>