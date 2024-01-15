<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$id = $_GET['id'];
echo $id;

$select = "SELECT * FROM portfolios WHERE id=$id";
$select_query = mysqli_query($connect,$select);
$after_assoc = mysqli_fetch_assoc($select_query);
$file_dir = '../uploads/portfolios/'.$after_assoc['image'];

unlink($file_dir);

$delete = "DELETE FROM portfolios WHERE id=$id";
mysqli_query($connect,$delete);


$_SESSION['delete'] = "Portfolio Deleted Successfully";
header('location:portfolios.php?section=Portfolios');
?>