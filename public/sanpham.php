<?php

include('../partials/connect.php.');

$sp = "select * from sanpham where idLoai = " . $_GET['id'];
$lh = "select * from loaihoa where idLoai = " . $_GET['id'];

$sanpham = mysqli_query($conn, $sp);
$loaihoa = mysqli_query($conn, $lh);

$loai = mysqli_fetch_assoc($loaihoa);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Sản Phẩm</title>
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
        <hr>
        <div class="container-fluid row">
            <div class="col-1"></div>
            <div class="pl-3"></div>
            <div class="col-10 row">
                <h2 class="col-12 card text-uppercase text-danger card-color"><?php echo $loai['TenLoai'] ?></h2>
                <?php foreach ($sanpham as $key => $value) : ?>
                    <div class="images col-3 mt-3">
                        <div class="card">
                            <a href="prodetail.php?id=<?php echo $value['id'] ?>" class="">
                                <img src="images/<?php echo $value['HinhAnh'] ?>" alt="" />
                            </a>
                            <div class="text-center">
                                <h2 class="text-capitalize"><?php echo $value['TenSP'] ?></h2>
                                <?php if ($value['GiaGiam'] != 0) { ?>
                                    <h5 class="text-success"><b><del><?php echo $value['Gia'] ?>đ</del></b></h5>
                                    <h3 class="text-success"><b><?php echo $value['GiaGiam'] ?>đ</b></h3>
                                <?php } else { ?>

                                    <h3 class="text-success m-4"><b><?php echo $value['Gia'] ?>đ</b></h3>
                                <?php } ?>
                                <div class="input-group justify-content-center">
                                    <div class="input-group-prepend ">
                                        <div class=""><a href="cart.php?id=<?php echo $value['id'] ?>  " class="btn btn-dark btn-dark-blue text-capitalize mb-4">
                                                Đặt hàng ngay </a> </div>
                                        <div class=" input-group-text btn-dark-blue-cart mb-4 " data-toggle="tooltip" data-placement="bottom" title="">
                                            <a href="cart.php?id=<?php echo $value['id'] ?>&btn=pdt" onclick="return confirm ('<?php echo 'Thêm' . $value['TenSP'] . ' vào giỏ hàng' ?>') " class="">
                                                <i class="fa-solid fa-cart-plus "></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

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

            <div class="col-1"></div>
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