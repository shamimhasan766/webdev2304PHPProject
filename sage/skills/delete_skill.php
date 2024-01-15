<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$id = $_GET['id'];
$name = $_GET['name'];



$delete = "DELETE FROM skills WHERE id=$id";
mysqli_query($connect,$delete);


$_SESSION['delete'] = "Skill '$name' Deleted Successfully";
header('location:skills.php?section=Skills');
?>