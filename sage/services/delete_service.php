<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$id = $_GET['id'];
$name = $_GET['name'];



$delete = "DELETE FROM services WHERE id=$id";
mysqli_query($connect,$delete);


$_SESSION['delete'] = "Service '$name' Deleted Successfully";
header('location:services.php?section=Services');
?>