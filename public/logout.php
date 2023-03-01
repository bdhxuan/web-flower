<?php 

include('../partials/connect.php.');
unset($_SESSION['user']);
unset($_SESSION['sanpham']);
header('location: index.php');

?>