<?php
include('../partials/connect.php.');

$loaihoa = mysqli_query($conn, "select * from loaihoa");
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];
}
$query = "select * from sanpham s join loaihoa l on s.idLoai = l.idLoai where TenSP like '%" . $keyword . "%' or TenLoai like '%" . $keyword . "%'";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contacts</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">

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

    <<header>
        <div class="row d-inline-flex">
            <a href="index.php" class="nav-link logo"><i class="fa-solid fa-fan"></i>Flower Store</a>

            <?php if (isset($user['Email'])) { ?>
                <?php if ($user['Email'] != "tienb1910154@gmail.com") { ?>
                    <nav class="navbar">
                        <a class=" btn" href="index.php">Trang Chủ</a>

                        <div class="dropdown">
                            <a href="sanpham.php" class="btn dropdown-toggle" data-toggle="dropdown">
                                Sản Phẩm
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="sanphamall.php">tat ca</a>
                                <?php while ($row = mysqli_fetch_array($loaihoa)) { ?>
                                    <a class="dropdown-item" href="sanpham.php?id=<?php echo $row['idLoai'] ?>"><?php echo $row['TenLoai'] ?></a>
                                <?php } ?>
                            </div>
                        </div>
                        <a href="introduce.php" class="btn">Giới Thiệu</a>
                        <a href="#footer_id" class="btn">Liên Hệ</a>
                        <a href="donhang.php?id_ND=<?php echo $user['id_ND'] ?>" class="btn">Đơn Hàng</a>
                    </nav>
                <?php } else { ?>
                    <nav class="navbar">
                        <a class="active btn" href="index.php">Trang Chủ</a>

                        <div class="dropdown">
                            <a href="sanpham.php" class="btn dropdown-toggle" data-toggle="dropdown">
                                Sản Phẩm
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="sanphamall.php">tat ca</a>
                                <?php while ($row = mysqli_fetch_array($loaihoa)) { ?>
                                    <a class="dropdown-item" href="sanpham.php?id=<?php echo $row['idLoai'] ?>"><?php echo $row['TenLoai'] ?></a>
                                <?php } ?>
                            </div>
                        </div>
                        <a href="introdudce.php" class="btn">Giới Thiệu</a>
                        <a href="#footer_id" class="btn">Liên Hệ</a>
                        <a href="donhang.php?id_ND=<?php echo $user['id_ND'] ?>" class="btn">Đơn Hàng</a>
                        <a href="nv_sanpham.php" class="btn">Admin</a>
                    </nav>
                <?php } ?>

            <?php } else { ?>


                <nav class="navbar">
                    <a class="active btn" href="index.php">Trang Chủ</a>

                    <div class="dropdown">
                        <a href="sanpham.php" class="btn dropdown-toggle" data-toggle="dropdown">
                            Sản Phẩm
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="sanphamall.php">tat ca</a>
                            <?php while ($row = mysqli_fetch_array($loaihoa)) { ?>
                                <a class="dropdown-item" href="sanpham.php?id=<?php echo $row['idLoai'] ?>"><?php echo $row['TenLoai'] ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <a href="introduce.php" class="btn">Giới Thiệu</a>
                    <a href="#footer_id" class="btn">Liên Hệ</a>
                    <a href="donhang.php" class="btn">Đơn Hàng</a>
                </nav>

            <?php } ?>

            <div class="icons row d-inline-flex">
                <nav class="navbar navbar-expand-sm navbar-dark">
                    <form class="form-inline" action="search.php" method="GET">
                        <input class="form-control mr-sm-2" type="text" value="<?php echo $keyword ?>" name="keyword">
                        <button class="btn btn-success" name="search" type="submit"><i class="fas fa-search" id="search-icon"></i></button>
                    </form>
                </nav>

                <i class="fa-solid fa-user mt-3" data-toggle="dropdown"></i>
                <div class="dropdown-menu">
                    <?php if (isset($user['Email'])) { ?>
                        <div class="dropdown-item"><i class="fas fa-check-circle"></i> <?php echo $user['TenND'] ?></div>
                        <a class="dropdown-item" href="logout.php?id"><i class="fas fa-sign-in-alt"></i> Đăng Xuất</a>
                    <?php } else { ?>
                        <a class="dropdown-item" href="login.php?id"><i class="fas fa-sign-in-alt"></i> Đăng nhập </a>
                        <a class="dropdown-item" href="dangky.php?id "><i class="fas fa-check-circle"></i> Đăng ký</a>

                    <?php } ?>
                </div>

                <a href="view_cart.php" class="fas fa-shopping-cart mt-3"></a>
            </div>

        </div>
        </header>

        <br><br>


        <main>
            <br><br>
            <div class="container-fluid row">
                <div class="col-1"></div>
                <div class="pl-3"></div>
                <div class="col-10 row">
                    <?php while ($value = mysqli_fetch_array($result)) { ?>
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
                    <?php } ?>
                </div>

                <div class="toastt">
                    <a href="#"><i class="icons fa-solid fa-angles-up text-danger" style="float: right; font-size:50px"></i></a>
                    <br><br><br>
                    
                    <div class="toast" data-autohide="false">
                        <div class="toast-body">

                            <div class="spinner-grow text-info border-2"><i class="fa-solid fa-phone"></i></div>

                            <strong class="mr-auto text-primary text-capitalize">tư vấn trực tiếp</strong>

                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>

                        </div>
                    </div>
                </div>

                <div class="col-1"></div>
                <script>
                    $(document).ready(function() {
                        $('.toast').toast('show');
                    });
                </script>


        </main>
        <br>

        <?php include('../partials/footer.php') ?>



</body>

</html>