<?php

include('../partials/connect.php.');
include('./sum_money.php');


$cart = (isset($_SESSION['sanpham'])) ? $_SESSION['sanpham'] : [];
$stt = 1;


$err = [];
if (isset($_POST['id_ND'])) {
    $id_ND = $_POST['id_ND'];
    $ten = $_POST['TenND'];
    $sdt = $_POST['SDT'];
    $diachi = $_POST['DiaChi'];
    $ten2 = $_POST['TenND2'];
    $sdt2 = $_POST['SDT2'];
    $diachi2 = $_POST['DiaChi2'];
    $ly = $_POST['note'];
    $loichuc = $_POST['lc'];
    $pttt = $_POST['pttt'];
    $ptgh = $_POST['ptgh'];

 

    if (empty($ten2)) {
        $err['ten2'] = "Bạn chưa nhập tên";
    }

    if (empty($sdt2)) {
        $err['sdt2'] = "Bạn chưa nhập SĐT";
    }
    if (empty($diachi2)) {
        $err['diachi2'] = "Bạn chưa nhập địa chỉ";
    }

    if (empty($err)) {

        $t = sum_money($cart);
        $total = $t;

        $sql = "insert into donhang (id_ND, TenND2, SDT2, DiaChi2, LuuY, LoiChuc, PTTT, PTGH, NgayDat, TongTien) values ('$id_ND','$ten2','$sdt2','$diachi2', '$ly', '$loichuc', '$pttt', '$ptgh', now(), '$total')";
        $query = mysqli_query($conn, $sql);

        $id_DH = mysqli_insert_id($conn);

        if ($query) {
            foreach ($cart as $key => $value2) :
                $idsp = $value2['id'];
                $soluong = $value2['soluong'];

                $sql = "insert into dh_chitiet (id_DH, id_SP, SoLuong) values ('$id_DH','$idsp','$soluong')";
                $query = mysqli_query($conn, $sql);
            endforeach;
            unset($_SESSION['sanpham']);
            header('location: donhang.php?id_ND=' . $id_ND);
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


    <script src="https://kit.fontawesome.com/fa204eeff7.js" crossorigin="anonymous"></script>


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

            <hr>

            <form action="" enctype="multipart/form-data" method="POST">
                <div class="container-fluid row">
                    <div class="col-lg-3 ml-5">
                        <h2 class="text-center h-color text-danger">Thông Tin Người Mua</h2>
                        <br>
                        <div class="form-group" hidden>
                            <label for="usernameInput">ID Khách Hàng:</label>
                            <input type="text" name="id_ND" id="usernameInput" class="form-control" readonly value="<?php echo $user['id_ND'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="usernameInput">Họ Tên:</label>
                            <input type="text" name="TenND" id="usernameInput" class="form-control" readonly value="<?php echo $user['TenND'] ?>">
                            <span class="err"><?php echo isset($err['ten']) ? $err['ten'] : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="usernameInput">SĐT:</label>
                            <input type="phone" name="SDT" id="usernameInput" class="form-control" readonly value="<?php echo $user['SDT'] ?>">
                            <span class="err"><?php echo isset($err['sdt']) ? $err['sdt'] : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="usernameInput">Địa Chỉ:</label>
                            <input type="text" name="DiaChi" id="usernameInput" class="form-control" readonly value="<?php echo $user['DiaChi'] ?>">
                            <span class="err"><?php echo isset($err['diachi']) ? $err['diachi'] : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="usernameInput">Lưu ý cho người bán:</label>
                            <input type="text" class="form-control" id="usernameInput" placeholder="Nhập lưu ý" name="note">
                        </div>
                    </div>
                    <div class="col-lg-3 mr-4 ml-3">
                        <h2 class="text-center h-color text-danger">Thông Tin Người Nhận</h2>
                        <br>
                        <div class="form-group">
                            <label for="usernameInput">
                                Họ và Tên:
                            </label>
                            <input type="text" name="TenND2" id="usernameInput" class="form-control" value="<?php echo $user['TenND'] ?>" placeholder="Nhập tên người dùng">
                            <span class="err"><?php echo isset($err['ten2']) ? $err['ten2'] : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="usernameInput">
                                Số Điện Thoại:
                            </label>
                            <input type="phone" name="SDT2" id="usernameInput" class="form-control" value="<?php echo $user['SDT'] ?>" placeholder="Nhập tên Số Điện Thoại">
                            <span class="err"><?php echo isset($err['sdt2']) ? $err['sdt2'] : '' ?></span>
                        </div>

                        <div class="form-group">
                            <label for="usernameInput">
                                Địa Chỉ Cụ Thể:
                            </label>
                            <input type="text" name="DiaChi2" id="usernameInput" class="form-control" value="<?php echo $user['DiaChi'] ?>" placeholder="Nhập tên Địa Chỉ">
                            <span class="err"><?php echo isset($err['diachi2']) ? $err['diachi2'] : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="usernameInput">Lời chúc:</label>
                            <input type="text" class="form-control" id="usernameInput" placeholder="Nhập lời chúc gửi đến người nhận (nếu có)" name="lc">
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <h2 class="text-center h-color text-danger">Thông Tin Đơn Hàng</h2>
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
                                <?php foreach ($cart as $key => $value) : ?>
                                    <tr>
                                        <td id="HinhAnh"><img src="images/<?php echo $value['hinhanh'] ?>" width="50px" height="50px"></td>
                                        <td id="TenSP"><?php echo $value['tensp'] ?></td>
                                        <td id="SoLuong"><?php echo $value['soluong'] ?></td>
                                        <td id="Gia"><?php echo $value['gia'] ?></td>
                                        <td><?php echo sum_money($cart) ?></td>
                                    </tr>

                                <?php endforeach ?>


                            </tbody>

                        </table>
                        <table>
                            <tr>
                                <td>
                                    <h2 class="ml-3 text-uppercase">Tổng Cộng:&nbsp;&nbsp;&nbsp;</h2>
                                </td>
                                <td></td>
                                <td>
                                    <h3><span><?php echo sum_money($cart) ?>đ</span></h3>
                                </td>
                            </tr>
                        </table>
                        <div class="m-2 d-flex">
                            <fieldset class="p-3 col-6 mr-3">
                                <legend class="text-success fw-bold">Phương thức thanh toán:</legend>
                                <select name="pttt" class="p-1">
                                    <option value="0">Thanh toán khi nhận hàng</option>
                                    <option value="1">Chuyển khoản</option>
                                </select>
                            </fieldset>
                            <fieldset class="p-3 ml-3 col-6">
                                <legend class="text-success fw-bold">Phương thức giao hàng:</legend>
                                <select name="ptgh" class="p-1">
                                    <option value="0">Giao hàng nhanh</option>
                                    <option value="1">Giao hàng tiết kiệm</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <button onclick="return confirm ('Đặt hàng thành công!') " class="btn text-uppercase btn-success btn-block font-weight-bold text-white" name="submit" style="font-size: 25px;">Đặt Hàng</button>

            </form>
        </div>
    <?php } else { ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Vui lòng đăng nhập để tiếp tục...</strong> <a href="login.php?action=checkout">Đăng Nhập</a>
        </div>
    <?php } ?>


    <div class="toastt">
        <div class="toast" data-autohide="false">
            <div class="toast-body">

                <div class="spinner-grow text-info border-2"><i class="fa-solid fa-phone"></i></div>

                <strong class="mr-auto text-primary text-capitalize">tư vấn trực tiếp</strong>

                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>

            </div>
        </div>
    </div>


    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
   
    <br>

    <?php include('../partials/footer.php') ?>

</body>

</html>