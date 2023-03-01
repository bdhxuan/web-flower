<?php

include('../partials/connect.php.');

$loaihoa = mysqli_query($conn, "select * from loaihoa");

$sanpham = mysqli_query($conn, "select * from sanpham");
$err = [];
if (isset($_GET['id'])) {

	$id = trim($_GET['id']);
	$data = mysqli_query($conn, "select * from sanpham where id = '$id'");

	$sp = mysqli_fetch_assoc($data);
}

if (isset($_POST['idMaSP'])) {
	$idma = $_POST['idMaSP'];
	$tensp = $_POST['TenSP'];
	$soluong = $_POST['SoLuong'];
	$gia =  $_POST['Gia'];
	$giagiam = $_POST['GiaGiam'];
	$idloai = $_POST['idLoai'];
	$spm = $_POST['spMoi'];
	$chitiet = $_POST['ChiTiet'];

	if (empty($idma)) {
		$err['idma'] = "Bạn chưa nhập mã sản phẩm";
	}
	if (empty($tensp)) {
		$err['tensp'] = "Bạn chưa nhập tên sản phẩm";
	}
	if (empty($soluong)) {
		$err['soluong'] = "Bạn chưa nhập số lượng sản phẩm";
	}
	if (empty($gia)) {
		$err['gia'] = "Bạn chưa nhập giá sản phẩm";
	}


	if (isset($_FILES['HinhAnh'])) {
		$file = $_FILES['HinhAnh'];
		$file_name = $file['name'];
		if (empty($file_name)) {
			$file_name = $sp['HinhAnh'];
		} else {
			move_uploaded_file($file['tmp_name'], 'images/' . $file_name);
		}
	}

	if (empty($err)) {
		$sql  = "update sanpham set idMaSP='$idma',TenSP='$tensp', SoLuong='$soluong', Gia='$gia', GiaGiam='$giagiam', idLoai='$idloai' ,spMoi='$spm', ChiTiet='$chitiet', HinhAnh='$file_name' where id=$id";
		$query = mysqli_query($conn, $sql);

		if ($query) {
			header('location: nv_sanpham.php');
		} else {
			echo 'loi';
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

	<title>Sửa Sản Phẩm</title>

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

	<header>
		<div class="row">
			<a href="index.php" class="nav-link logo"><i class="fa-solid fa-fan"></i>Flower Store</a>
			<nav class="navbar">
                <a class=" btn" href="index.php">Trang Chủ</a>
                <div class="dropdown ">
                    <a href="#" class="btn dropdown-toggle active" data-toggle="dropdown">
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
	<br><br><br><br><br>
	<div class=" container-fluid row">
		<div class="col-3"></div>
		<div class="card col-6"><br>
			<div class="text-uppercase text-center ">
				<h2 class="font-weight-bold" style="color:palevioletred; font-size:40px">
					Sửa Sản Phẩm
				</h2>
			</div>
			<div class="card-body">
				<form name="frm" id="frm" action="" enctype="multipart/form-data" method="post">
					<div class="">
						<label for="name">Mã sản phẩm</label>
						<input type="text" name="idMaSP" class="form-control" maxlen="255" id="name" placeholder="Nhập mã sản phẩm" value="<?php echo $sp['idMaSP'] ?>" />
						<span class="err"><?php echo isset($err['idma']) ? $err['idma'] : '' ?></span>

					</div>
					<div class="">
						<label for="name">Tên sản phẩm</label>
						<input type="text" name="TenSP" class="form-control" maxlen="255" id="name" placeholder="Nhập tên sản phẩm" value="<?php echo $sp['TenSP'] ?>" />
						<span class="err"><?php echo isset($err['tensp']) ? $err['tensp'] : '' ?></span>

					</div>
					<div class="">
						<label for="phone">Số lượng</label>
						<input type="text" name="SoLuong" class="form-control" maxlen="255" id="phone" placeholder="Nhập số lượng" value="<?php echo $sp['SoLuong'] ?>" />
						<span class="err"><?php echo isset($err['soluong']) ? $err['soluong'] : '' ?></span>


					</div>
					<div class="">
						<label for="">Giá</label>
						<input type="text" name="Gia" class="form-control" placeholder="Nhập giá sản phẩm" value="<?php echo $sp['Gia'] ?>" />

						<span class="err"><?php echo isset($err['gia']) ? $err['gia'] : '' ?></span>

					</div>
					<div class="">
						<label for="">Giá Giảm</label>
						<input type="text" name="GiaGiam" class="form-control" placeholder="Nhập giá sản phẩm" value="<?php echo $sp['GiaGiam'] ?>" />


					</div>
					<br>
					<div class="form-group">
						<label for="phone">Loai Hoa</label>
						<select name="idLoai" id="">

							<?php foreach ($loaihoa as $key => $value) { ?>

								<?php if ($sp['idLoai'] == $value['idLoai']) { ?>
									<option value="<?php echo $value['idLoai'] ?>"><?php echo $value['TenLoai'] ?></option>
								<?php } ?>

							<?php } ?>

							<?php foreach ($loaihoa as $key => $value) { ?>

								<?php if ($sp['idLoai'] != $value['idLoai']) { ?>
									<option value="<?php echo $value['idLoai'] ?>"><?php echo $value['TenLoai'] ?></option>
								<?php } ?>

							<?php } ?>
						</select>

					</div>
					<div class="form-group">
						<label for="phone">Sản Phẩm Mới&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<?php if ($sp['spMoi'] == 1) { ?>
							<input type="radio" value="1" name="spMoi" checked="checked"> Có &nbsp;&nbsp;
							<input type="radio" value="0" name="spMoi"> Không
						<?php } else { ?>
							<input type="radio" value="1" name="spMoi"> Có &nbsp;&nbsp;
							<input type="radio" value="0" name="spMoi" checked="checked"> Không
						<?php } ?>
					</div>
					<div class="">
						<label for="description">Chi tiết sản phẩm </label>
						<textarea name="ChiTiet" id="notes" class="form-control" value=""><?php echo $sp['ChiTiet'] ?></textarea>


					</div>
					<div class="">
						<label for="description">Hình ảnh </label>
						<input type="file" name="HinhAnh" class="form-control" value="" />
						<img src="images/<?php echo $sp['HinhAnh'] ?>" width="60px" height="60px">

					</div>

					<button type="submit" name="submit" id="submit" class="btn btn-success btn-block text-uppercase" style="font-size: 20px;">Cập Nhật</button>
				</form>

			</div>
		</div>
	</div>



	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script>
		$(document).ready(function() {
			new WOW().init();
			$('#contacts').DataTable();
		});
	</script>


	<div id="delete-confirm" class="modal fade" role="dialog">"
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Confirmation</h4>
				</div>
				<div class="modal-body">Do you want to delete this contact?</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Delete</button>
					<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
				</div>
			</div>
		</div>
	</div>


	<script>
		$(document).ready(function() {
			new WOW().init();
			$('#contacts').DataTable();
			$('button[name="delete-contact"]').on('click', function(e) {
				const $form = $(this).closest('form');
				e.preventDefault();
				$('#delete-confirm').modal({
						backdrop: 'static',
						keyboard: false
					})
					.one('click', '#delete', function() {
						$form.trigger('submit');
					});
			});
		});
	</script>
</body>

</html>