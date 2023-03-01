<?php

include('../partials/connect.php.');

$sanpham = mysqli_query($conn, "select * from sanpham");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Giới Thiệu</title>
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
            <h1 class="col-12 text-uppercase text-center font-weight-bold" style="color:palevioletred">Flower Store Cần Thơ</h1>
            <br><br><br><br>
            <div class=" col-5" style="margin-left: 40px;">
                <img src="images/TTD_Announcement_FreeshipToanQuoc_WebBanner1000x500-800x400.webp" width="750px" height="300px">

                <br><br><br>

                <h4 class="text-uppercase text-center font-weight-bold text-success">Đặt hoa online - ưu đãi hấp dẫn</h4>
                <br>
                <p>Khi đặt hoa online tại shop hoa tươi Flower Store, bạn không chỉ được miễn phí giao hàng với hóa đơn trên 500.000đ, tặng kèm thiệp chúc mừng, mà còn được giảm đến 50k cho đơn hàng đầu tiên. Bên cạnh đó, vào mỗi thứ 6 hàng tuần, bạn cũng sẽ được giảm ngay 10% tối đa lên đến 100k với chương trình ưu đãi Thứ 6 vui vẻ. Đặc biệt, những khách hàng cũ cũng sẽ được giảm giá lên đến 10% cho các đơn hàng tiếp theo.</p>
                <br><br><br><br><br>
                <img src="images/background-nha-hoa-gui-trao-cam-xuc_optimized.png" width="750px" height="300px">
                <br><br><br>
                <h4 class="text-uppercase text-center font-weight-bold text-success">Cam kết từ Flower Store</h4>
                <br>
                <p>Flower Store hiểu rằng mỗi một bó hoa gửi đi gửi gắm rất nhiều tình cảm, thông điệp yêu thương mà bạn muốn gửi đến những người thân. Chính vì thế, Flower Store luôn nỗ lực nâng cao chất lượng sản phẩm và dịch vụ để mang đến bạn những trải nghiệm tuyệt vời nhất khi sử dụng dịch vụ của Flower Corner. FLower Store cam kết:
                    <li>Chỉ sử dụng hoa tươi mới nhập về trong ngày.</li>
                    <li>Hoa đẹp và 90% giống như hình.</li>
                    <li>Giao hoa nhanh, đúng giờ.</li>
                    Nếu bạn đang cần đặt hoa để gửi tặng người thân trong những dịp đặc biệt, gọi ngay <a href="#">+84914917152</a> để được tư vấn hoặc đặt hoa giao nhanh với Flower Store nhé!
                </p>
            </div>
            <div class="col-1"></div>
            <div class=" col-5" style="margin-right: 20px;">
                <h4 class="text-uppercase text-center font-weight-bold text-success">Giới thiệu về Flower Store</h4>
                <br>
                <p>Flower Store là shop hoa tươi uy tín tại TP.Cần Thơ, Việt Nam. Flower Store cung cấp dịch vụ điện hoa và đặt hoa online 24/7 giao tận nơi tại TP HCM, Hà Nội, TP.Cần Thơ và trên tất cả các tỉnh – thành phố tại Việt Nam. Với hệ thống cửa hàng hoa tươi liên kết trên khắp tất cả các tỉnh – thành phố trên toàn quốc, Flower Store có thể giúp bạn gửi tặng hoa tươi cho người thân ở bất cứ nơi đâu tại Việt Nam. Flower Store cam kết mang đến cho bạn những sản phẩm hoa tươi chất lượng cao, với mức giá tốt nhất và dịch chuyên nghiệp nhất khi sử dụng dịch vụ đặt hoa tươi online giao tận nơi tại <a href="index.php">Flowerstore.vn</a></p>
                <br><br><br><br>
                <img src="images/Screenshot 2022-04-19 164717.png" width="750px" height="300px">
                <br><br><br>
                <h4 class="text-uppercase text-center font-weight-bold text-success">Tại sao nên chọn chúng tôi <i class="fa-solid fa-question"></i></h4>
                <br>
                <p> Không khó để bạn tìm được một cửa hàng hoa cung cấp dịch vụ đặt hoa online giao tận nơi. Vậy tại sao bạn nên sử dụng dịch vụ điện hoa (Flower Delivery) của shop hoa tươi Flower Store?
                    <li>Hoa đẹp, thiết kế đa dạng phù hợp với tất cả sự kiện.</li>
                    <li> Thiết kế theo yêu cầu của khách hàng.</li>
                    <li> Gửi hình hoa trước khi giao.</li>
                    <li> Đội ngũ florists chuyên nghiệp với nhiều năm kinh nghiệm.</li>
                </p>
                <br><br><br><br><br>
                <img src="images/shaking-hands-1018096_1280.webp" width="750px" height="300px">
            </div>
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