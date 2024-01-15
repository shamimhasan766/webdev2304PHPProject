<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$id = $_GET['id'];
$name = $_GET['name'];


$select = "SELECT * FROM testimonial WHERE id=$id";
$select_query = mysqli_query($connect,$select);
$after_assoc = mysqli_fetch_assoc($select_query);
$file_dir = '../uploads/testimonial/'.$after_assoc['image'];

unlink($file_dir);

$delete = "DELETE FROM testimonial WHERE id=$id";
mysqli_query($connect,$delete);



$_SESSION['delete'] = "Testimonial From '$name' Deleted Successfully";
header('location:testimonial.php?section=Testimonial');
?>