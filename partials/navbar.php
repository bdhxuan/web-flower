<?php

include('../partials/connect.php.');
require_once '../bootstrap.php';

$loaihoa = mysqli_query($conn, "select * from loaihoa");
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

// var_dump($user);
// die();

?>
<header>
	<div class="row d-inline-flex">
		<a href="index.php" class="nav-link logo"><i class="fa-solid fa-fan"></i>Flower Store</a>

		<?php if (isset($user['Email'])) { ?>
			<?php if ($user['Email'] != "admin@gmail.com") { ?>
				<nav class="navbar">
					<a class=" btn" href="index.php">Trang Chủ</a>

					<div class="dropdown">
						<a href="sanpham.php" class="btn dropdown-toggle" data-toggle="dropdown">
							Sản Phẩm
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="sanphamall.php">Tất cả</a>
							<?php while ($row = mysqli_fetch_array($loaihoa)) { ?>
								<a class="dropdown-item" href="sanpham.php?id=<?php echo $row['idLoai'] ?>"><?php echo $row['TenLoai'] ?></a>
							<?php } ?>
							<!-- <a class="dropdown-item" href="#">Hoa khai trương</a>
					<a class="dropdown-item" href="#">...</a> -->
						</div>
					</div>
					<a href="introduce.php" class="btn">Giới Thiệu</a>
					<a href="#footer_id" class="btn">Liên Hệ</a>
					<a href="donhang.php?id_ND=<?php echo $user['id_ND'] ?>" class="btn">Đơn Hàng</a>
				</nav>
			<?php } else { ?>
				<nav class="navbar">
					<a class="btn" href="index.php">Trang Chủ</a>

					<div class="dropdown">
						<a href="sanpham.php" class="btn dropdown-toggle" data-toggle="dropdown">
							Sản Phẩm
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="sanphamall.php">Tất Cả</a>
							<?php while ($row = mysqli_fetch_array($loaihoa)) { ?>
								<a class="dropdown-item" href="sanpham.php?id=<?php echo $row['idLoai'] ?>"><?php echo $row['TenLoai'] ?></a>
							<?php } ?>
							<!-- <a class="dropdown-item" href="#">Hoa khai trương</a>
					<a class="dropdown-item" href="#">...</a> -->
						</div>
					</div>
					<a href="introduce.php" class="btn">Giới Thiệu</a>
					<a href="#footer_id" class="btn">Liên Hệ</a>
					<!-- <a href="donhang.php?id_ND=<?php echo $user['id_ND'] ?>" class="btn">Đơn Hàng</a> -->
					<a href="nv_sanpham.php" class="btn">Admin</a>
				</nav>
			<?php } ?>

		<?php } else { ?>


			<nav class="navbar">
				<a class="btn" href="index.php">Trang Chủ</a>

				<div class="dropdown">
					<a href="sanpham.php" class="btn dropdown-toggle" data-toggle="dropdown">
						Sản Phẩm
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="sanphamall.php">Tất Cả</a>
						<?php while ($row = mysqli_fetch_array($loaihoa)) { ?>
							<a class="dropdown-item" href="sanpham.php?id=<?php echo $row['idLoai'] ?>"><?php echo $row['TenLoai'] ?></a>
						<?php } ?>
						<!-- <a class="dropdown-item" href="#">Hoa khai trương</a>
					<a class="dropdown-item" href="#">...</a> -->
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
					<input class="form-control mr-sm-2" type="text" placeholder="Search..." name="keyword">
					<button class="btn btn-success" name="search" type="submit"><i class="fas fa-search" id="search-icon"></i></button>
				</form>
			</nav>
			<!-- <a href="#" class="fas fa-heart"></a> -->

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