<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$id = $_GET['id'];
$name = $_GET['name'];



$delete = "DELETE FROM menu WHERE id=$id";
mysqli_query($connect,$delete);


$_SESSION['delete'] = "Menu '$name' Deleted Successfully";
header('location:menu.php?section=Menu Bar');
?>