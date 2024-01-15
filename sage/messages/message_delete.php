<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$id = $_GET['id'];
$name = $_GET['name'];



$delete = "DELETE FROM messages WHERE id=$id";
mysqli_query($connect,$delete);


$_SESSION['delete'] = "Message From '$name' Deleted Successfully";
header('location:allmessages.php?section=Messages');
?>