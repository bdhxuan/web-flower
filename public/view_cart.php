<?php

include('../partials/connect.php.');
include('./sum_money.php');

$cart = (isset($_SESSION['sanpham'])) ? $_SESSION['sanpham'] : [];
$stt = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <title>Contacts</title> -->
    <title>Giỏ Hàng</title>
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
    <hr>
    <div class="container-fluid row">
        <div class="col-1"></div>
        <div class="col-10">
            <h2 class="text-center text-uppercase font-weight-bold" style="color:palevioletred">Giỏ Hàng Của Bạn</h2>
            <br>
            <table class="table table-bordered table-hover">
                <thead>

                    <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $key => $value) : ?>
                        <tr>
                            <td><?php echo $stt++ ?></td>
                            <td><img src="images/<?php echo $value['hinhanh'] ?>" width="50px" height="50px"></td>
                            <td><?php echo $value['tensp'] ?></td>
                            <td>
                                <form action="cart.php" method="get">
                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                    <input type="number" name="quality" value="<?php echo $value['soluong'] ?>" min="0" max="100" size="3">
                                    <button type="submit" class="btn btn-info">Cập nhật</button>
                                </form>
                                

                            </td>
                            <td><?php echo $value['gia'] ?></td>
                            <?php $t = $value['gia'] * $value['soluong'] ?>
                            <td><?php echo $t ?></td>
                            <td><a href="delete_cart.php?id= <?php echo $value['id'] ?>&action=delete " class="btn  btn-danger" title="xoa" onclick="return confirm ('Bạn có muốn xóa không?')">Delete</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <h3 class="text-center">
                <span>Tổng tiền: </span>
                <?php $temp  = sum_money($cart) ?>
                <span><?php echo  $temp ?>VND</span>
                <?php if ($temp == 0) { ?>
                    <a href="#" class="btn btn-success" onclick="return confirm ('Chưa có sản phẩm nào trong giỏ hàng!') ">THANH TOÁN</a>
                <?php } else { ?>
                    <a href="checkout.php" class="btn btn-success">THANH TOÁN</a>

                <?php } ?>
            </h3>

        </div>
        <div class="col-1"></div>
    </div>


    <?php include('../partials/footer.php') ?>

</body>

</html>