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

	<title>Trang chủ</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

	<link href="css/sticky-footer.css" rel=" stylesheet">
	<link href="css/font-awesome.min.css" rel=" stylesheet">
	<link href="css/animate.css" rel=" stylesheet">

	<script src="https://kit.fontawesome.com/fa204eeff7.js" crossorigin="anonymous"></script>

	<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">

</head>



<body class="preloading">

	<?php include('../partials/navbar.php') ?>
	<div class="main">
		<div class="loader-container">
			<img src="../loading.gif" alt="" width="60px" height="50px">
		</div>
		<div class="container-fluid row">
			<div class="col-1"></div>
			<div class="col-10">
				<div id="carousel-example-generic" class="carousel slide" data-interval="5000" data-ride="carousel">
					<ul class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
						<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
					</ul>
					<div class="carousel-inner">
						<div class="carousel-item active  ">
							<img class="" alt="First slide" src="images/header2.jpg" width="100%" height=" 100%" />

							<div class="carousel-caption d-none d-md-block text-left col-5">
								<span class="text-success text-uppercase">our special flower</span>
								<h1 class="font-weight-bold text-dark-blue">Hoa hồng o'hara</h3>
									<p class="text-dark">Hoa hồng với vẻ đẹp kiêu sa và cuốn hút là một trong những loài
										mang giống hồng có
										mùi hương thơm ngây ngất, bày tỏ sự ngọt ngào của tình yêu đôi lứa.</p>
									<a href="#" class="btn btn-dark btn-dark-blue text-capitalize">Đặt hàng ngay</a>
							</div>
						</div>
						<div class="carousel-item ">
							<img class="img-fluid" alt="Second slide" src="images/header1.jpg" width="100%" height="100%" />
							<div class="carousel-caption d-none d-md-block text-left col-5">
								<span class="text-success text-uppercase">our special flower</span>
								<h1 class="font-weight-bold text-dark-blue">Hoa cẩm chướng</h3>
									<p class="text-dark">Cẩm Chướng thơm đặc trưng và quyến rũ, một nét đẹp dịu dàng,
										trầm lặng đầy kiêu sa nên hoa thể hiện sự ái mộ, sắc đẹp và tình yêu của phụ nữ.
									</p>
									<a href="#" class="btn btn-dark btn-dark-blue">Đặt hàng ngay</a>
							</div>

						</div>
					</div>
					<a class="left carousel-control-prev" href="#carousel-example-generic" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="right carousel-control-next" href="#carousel-example-generic" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					</a>
				</div>
			</div>
			<div class="col-1"></div>
		</div>

		<hr>

		<div class="container-fluid row">
			<div class="col-1"></div>
			<div class="pl-3"></div>
			<div class="col-10 row ">
				<h2 class="col-12 text-uppercase card-color p-3 text-danger"><b>sale</b></h2>
				<?php foreach ($sanpham as $key => $value) : ?>
					<?php if ($value['GiaGiam'] != 0) { ?>

						<div class="images col-3 mt-3">
							<div class="card">
								<a href="prodetail.php?id=<?php echo $value['id'] ?>" class="">
									<img src="images/<?php echo $value['HinhAnh'] ?>" alt="" />
								</a>
								<div class="text-center">
									<h2 class="text-capitalize"><?php echo $value['TenSP'] ?></h2>
									<h4 class="text-success"><b><del><?php echo $value['Gia'] ?>đ</del></b></h4>

									<h3 class="text-success"><b><?php echo $value['GiaGiam'] ?>đ</b></h3>
									<div class="input-group justify-content-center">
										<div class="input-group-prepend ">
											<div class=""><a href="cart.php?id=<?php echo $value['id'] ?>  " class="btn btn-dark btn-dark-blue text-capitalize mb-4">
													Đặt hàng ngay </a> </div>
											<div class=" input-group-text btn-dark-blue-cart mb-4 " data-toggle="tooltip" data-placement="bottom" title="">
												<a href="cart.php?id=<?php echo $value['id'] ?>&btn=pdt" onclick="return confirm ('<?php echo 'da them' . $value['TenSP'] . ' vao gio hang' ?>') " class="">
													<i class="fa-solid fa-cart-plus "></i>
												</a>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>

					<?php } ?>

				<?php endforeach ?>
				<div class="col-12"></div>
				<br>
				<h2 class="col-12 text-uppercase card-color text-danger p-3 font-weight-bold">Sản Phẩm Mới</h2>
				<?php foreach ($sanpham as $key => $value) : ?>
					<?php if ((int)$value['spMoi'] == 1 && $value['GiaGiam'] == 0) { ?>
						<div class="images col-3 mt-3 ">
							<div class="card">
								<a href="prodetail.php?id=<?php echo $value['id'] ?>" class="">
									<img src="images/<?php echo $value['HinhAnh'] ?>" alt="" />
								</a>
								<div class="text-center">
									<h2 class="text-capitalize"><?php echo $value['TenSP'] ?></h2>
									<h3 class="text-success"><b><?php echo $value['Gia'] ?>đ</b></h3>

									<div class="input-group justify-content-center">
										<div class="input-group-prepend ">
											<div class=""><a href="cart.php?id=<?php echo $value['id'] ?>  " class="btn btn-dark btn-dark-blue text-capitalize mb-4">
													Đặt hàng ngay </a> </div>
											<div class=" input-group-text btn-dark-blue-cart mb-4 " data-toggle="tooltip" data-placement="bottom" title="">
												<a href="cart.php?id=<?php echo $value['id'] ?>&btn=btn" onclick="return confirm ('<?php echo 'da them' . $value['TenSP'] . ' vao gio hang' ?>') " class="">
													<i class="fa-solid fa-cart-plus "></i>
												</a>

											</div>
										</div>
									</div>

								</div>
							</div>
						</div>

					<?php } ?>

				<?php endforeach ?>
			</div>

			<div class="col-1"></div>
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


	</div>
	<br>

	<?php include('../partials/footer.php') ?>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script src="js/script.js"></script>

</body>

</html>