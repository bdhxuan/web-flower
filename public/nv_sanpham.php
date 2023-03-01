<?php

include('../partials/connect.php.');

$sanpham = mysqli_query($conn, "select * from sanpham");
$loaihoa = mysqli_query($conn, "select * from loaihoa");
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Quản Lý Sản Phẩm</title>

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
					<a href="sanphamall.php" class="btn dropdown-toggle active" data-toggle="dropdown">
						Quản Lý Sản Phẩm
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item " href="nv_sanpham.php">Danh sách sản phẩm</a>
						<a class="dropdown-item" href="nv_loaihoa.php">Danh sách loại sản phẩm</a>
					</div>
				</div>

				<a href="nv_donhang.php" class=" btn">Quản Lý Đơn Hàng</a>

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


	<!-- Main Page Content -->
	<br><br>
	<div class="container-fluid">
		<section id="inner" class="inner-section section m-5">
			<div class="inner-wrapper row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-sm navbar-dark" style="margin-bottom: 30px; float:right">
						<form class="form-inline" method="GET" action="search_nv_sanpham.php">
							<input class="form-control mr-sm-2" type="text" placeholder="Search..." name="keyword">
							<button class="btn btn-success" name="search" type="submit"><i class="fas fa-search" id="search-icon"></i></button>
						</form>
					</nav>
					<a href="add.php" class="btn btn-success mt-2" style="margin-bottom: 30px;">
						<i class="fa fa-plus"></i>Thêm Sản Phẩm</a>
					<a href="addLoai.php" class="btn btn-success mt-2" style="margin-bottom: 30px;">
						<i class="fa fa-plus"></i>Thêm Loại Hoa</a>
					<!-- Table Starts Here -->
					<table id="contacts" class="table table-bordered table-responsive table-striped" style="width: 100%;">
						<thead>
							<tr>
								<th>Mã Sản Phẩm</th>
								<th>Tên Sản Phẩm</th>
								<th>Số Lượng</th>

								<th>Giá</th>
								<th>Giá Giảm</th>
								<th>Loại Hoa</th>
								<th>Sản Phẩm Mới</th>
								<th>Chi Tiết</th>
								<th>Hình Ảnh</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($sanpham as $key => $value1) : ?>
								<tr>
									<td><?php echo $value1['idMaSP'] ?></td>
									<td><?php echo $value1['TenSP'] ?></td>
									<td><?php echo $value1['SoLuong'] ?></td>

									<td><?php echo $value1['Gia'] ?></td>

									<td><?php echo $value1['GiaGiam'] ?></td>
									<?php foreach ($loaihoa as $key => $value) :  ?>
										<?php if ($value1['idLoai'] == $value['idLoai']) { ?>
											<td><?php echo $value['TenLoai'] ?></td>
										<?php } ?>
									<?php endforeach ?>
									<?php if ($value1['spMoi'] == 1) { ?>
										<td>Có</td>
									<?php } else { ?>
										<td>Không</td>
									<?php } ?>
									<td><?php echo $value1['ChiTiet'] ?></td>
									<td><img src="images/<?php echo $value1['HinhAnh'] ?>" width="50px" height="50px"></td>

									<td><a href="edit.php?id= <?php echo $value1['id'] ?>" class="btn btn-info" title="sua">Edit</a></td>
									<td><a href="delete.php?id= <?php echo $value1['id'] ?>" class="btn  btn-danger" title="xoa" onclick="return confirm ('ban co muon xoa khong')">Delete</a></td>

								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<!-- Table Ends Here -->
				</div>
			</div>
		</section>
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