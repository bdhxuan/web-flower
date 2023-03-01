<?php

include('../partials/connect.php.');

$thanhvien = mysqli_query($conn, "select * from thanhvien");
$chucvu = mysqli_query($conn, "select * from chucvu");
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];
}
$sql = "select * from thanhvien t join chucvu c on t.ChucVu = c.idcv
                                join chitietnd ct on t.id_TT = ct.id_ND
                                where MaNV like '%" . $keyword . "%' or TenND like '%" . $keyword . "%' or TenCV like '%" . $keyword . "%' or SDT like '%" . $keyword . "%'";
$query = mysqli_query($conn, $sql);

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
                    <a href="sanphamall.php" class="btn dropdown-toggle" data-toggle="dropdown">
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
                        <a class="dropdown-item " href="nv_thanhvien.php">Danh sách thành viên</a>
                        <a class="dropdown-item" href="nv_nguoidung.php">Danh sách người dùng</a>
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


    <!-- Main Page Content -->
    <div class="container-fluid">
        <br><br>
        <div class="inner-wrapper row col-md-12">
            <div class="col-md-12 mt-3">
                <nav class="navbar navbar-expand-sm navbar-dark " style="margin-bottom: 30px; float:right">
                    <form class="form-inline" method="GET" action="search_member.php">
                        <input class="form-control mr-sm-2" type="text" value="<?php echo $keyword ?>" name="keyword">
                        <button class="btn btn-success" name="search" type="submit"><i class="fas fa-search" id="search-icon"></i></button>
                    </form>
                </nav>
                <a href="nv_add.php" class="btn  btn-success" style="margin-bottom: 30px;">
                    <i class="fa fa-plus"></i> Thêm thành viên</a>
            </div>
            <div class="col-1"></div>
            <div class="col-10">
                <table id="contacts" class="table table-bordered  table-striped">
                    <thead>
                        <tr>
                            <th>Mã Nhân Viên</th>
                            <th>Tên Nhân Viên</th>
                            <th>Chức Vụ</th>
                            <th>Số Điện Thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($value1 = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><?php echo $value1['MaNV'] ?></td>
                                <td><?php echo $value1['TenND'] ?></td>

                                <?php foreach ($chucvu as $key => $value) :  ?>
                                    <?php if ($value1['ChucVu'] == $value['idcv']) { ?>
                                        <td><?php echo $value['TenCV'] ?></td>
                                    <?php } ?>
                                <?php endforeach ?>
                                <td><?php echo $value1['SDT'] ?></td>
                                <td><?php echo $value1['Email'] ?></td>
                                <td><?php echo $value1['DiaChi'] ?></td>
                                <td><a href="nv_edit.php?id= <?php echo $value1['id'] ?>" class="btn btn-info" title="sua">Edit</a></td>
                                <td><a href="nv_delete.php?id= <?php echo $value1['id'] ?>" class="btn  btn-danger" title="xoa" onclick="return confirm ('ban co muon xoa khong')">Delete</a></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-1"></div>
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