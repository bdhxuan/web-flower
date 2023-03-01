<?php

include('../partials/connect.php.');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$spdetail = "select * from sanpham where id = $id";
$resultdetail = mysqli_query($conn, $spdetail);

$spother = "select * from sanpham ";
$resultother = mysqli_query($conn, $spother);

$dl = "select * from sanpham s inner join loaihoa l where s.idLoai = l.idLoai and s.id = $id";
$result = mysqli_query($conn, $dl);

$stt = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <title>Contacts</title> -->
    <title>Chi Tiết Sản Phẩm</title>
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
    <?php include('../partials/navbar.php') ?>
    <div class="main">
        <div class="container-fluid row">
            <div class="col-1"></div>
            <div class="col-10"></div>
            <?php foreach ($resultdetail as $key => $value1) : ?>
                <div class="col-2"></div>
                <div class="col-4">
                    <div class="col-10"></div>
                    <img src="images/<?php echo $value1['HinhAnh'] ?>" alt="" width="400x" height="500px" class="mt-5" />
                </div>
                <div class="col-1"></div>
                <div class="col-4">
                    <h1 class="text-uppercase text-center h-color text-danger"><?php echo $value1['TenSP'] ?></h1>
                    <hr>
                    <h3>Thương Hiệu: <a href="index.php">Flower Store</a></h3>
                    <?php if ($value1['GiaGiam'] != 0) { ?>
                        <h2 class="text-dark mt-4"><i class="fa-solid fa-xmark text-danger"></i> Giá Gốc: <b><del><?php echo $value1['Gia'] ?>đ</del></b></h2>
                        <h2 class="mt-4 text-success"><i class="fa-solid fa-hand-point-right"></i> Chỉ Còn: <b><?php echo $value1['GiaGiam'] ?>đ</b></h2>
                    <?php } else { ?>
                        <h2 class="text-success mt-4"><i class="fa-solid fa-hand-point-right"></i> Giá: <b><?php echo $value1['Gia'] ?>đ</b></h2>
                    <?php } ?>

                    <h3 class="text-uppercase text-danger"><b>Tại sao lại chọn chúng tôi <i class="fa-solid fa-question"></i></b></h3>
                    <div class="mt-3">
                        <h4><i class="fa-solid fa-truck-fast text-success"></i> Miễn phí vận chuyển</h4>
                        <h4><i class="fa-solid fa-clock-rotate-left text-success"></i> Nhận hàng ngay trong ngày tại TP.Cần Thơ</h4>
                        <h4><i class="fa-solid fa-gift text-success"></i> Miễn phí thiệp chúc mừng</h4>
                        <h4><i class="fa-solid fa-clover text-success"></i> Đảm bảo hoa tươi</h4>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-uppercase font-weight-bold text-danger">Mô Tả Sản Phẩm</h3>
                        <p class="text-left"><?php echo $value1['ChiTiet'] ?></p>
                    </div>
                    <br>

                    <div class="input-group">
                        <div class="input-group-prepend btn-block ">
                            <button type="button" class="btn btn-block btn-dark btn-dark-blue mb-4">
                                <a href="cart.php?id=<?php echo $value1['id'] ?>" class="text-white text-decoration-none text-uppercase" style="font-size: 25px;"> Đặt hàng ngay </a>
                            </button>
                            <button type="button" class="btn input-group-text btn-dark-blue mb-4 " style="font-size: 25px;" data-toggle="tooltip" data-placement="bottom" title="">
                                <a href="cart.php?id=<?php echo $value1['id'] ?>&btn=pdt" onclick="return confirm ('<?php echo 'Thêm' . $value1['TenSP'] . ' vào giỏ hàng' ?>') " class="">
                                    <i class="fa-solid fa-cart-plus "></i>
                                </a>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="col-1"></div>

        </div>
        <br>
        <br>
        <div class="container-fluid row">
            <div class="col-1"></div>
            <div class="pl-3"></div>
            <div class="col-10 row">

            </div>
        </div>
    <?php endforeach ?>

    <br>
    <div class="container-fluid row">
        <div class="col-1"></div>
        <div class="pl-3"></div>
        <div class="col-10 row">
            <h2 class="col-12 text-uppercase text-center h-color text-danger font-weight-bold">Sản Phẩm Cùng Loại</h2>
            <?php foreach ($resultother as $key => $value2) :  ?>
                <?php if ($value2['idLoai'] == $value1['idLoai'] && $value2['idMaSP'] != $value1['idMaSP'] && $stt < 4) { ?>
                    <div class="images col-3 mt-3">
                        <div class="card">
                            <a href="prodetail.php?id=<?php echo $value2['id'] ?>" class="">
                                <img src="images/<?php echo $value2['HinhAnh'] ?>" alt="" />
                            </a>
                            <div class="text-center">
                                <h2 class="text-capitalize"><?php echo $value2['TenSP'] ?></h2>
                                <?php if ($value2['GiaGiam'] != 0) { ?>
                                    <h5 class="text-success"><b><del><?php echo $value2['Gia'] ?>đ</del></b></h5>
                                    <h3 class="text-success"><b><?php echo $value2['GiaGiam'] ?>đ</b></h3>
                                <?php } else { ?>

                                    <h3 class="text-success m-4"><b><?php echo $value2['Gia'] ?>đ</b></h3>
                                <?php } ?>
                                <div class="input-group justify-content-center">
                                    <div class="input-group-prepend ">
                                        <div class=""><a href="cart.php?id=<?php echo $value2['id'] ?>  " class="btn btn-dark btn-dark-blue text-capitalize mb-4">
                                                Đặt hàng ngay </a> </div>
                                        <div class=" input-group-text btn-dark-blue-cart mb-4 " data-toggle="tooltip" data-placement="bottom" title="">
                                            <a href="cart.php?id=<?php echo $value2['id'] ?>&btn=pdt" onclick="return confirm ('<?php echo 'da them' . $value['TenSP'] . ' vao gio hang' ?>') " class="">
                                                <i class="fa-solid fa-cart-plus "></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $stt++; ?>
                <?php } ?>
            <?php endforeach ?>

        </div>

        <div class="toastt">
            <a href="#"><i class="icons fa-solid fa-angles-up text-danger" style="float: right; font-size:50px"></i></a>
            <br><br><br><br><br>
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