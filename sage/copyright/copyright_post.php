<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$btn =$_POST['btn'];

$select_copyright = "SELECT * FROM copyright WHERE id=1" ;
$select_copyright_res = mysqli_query($connect, $select_copyright);
$copyright = mysqli_fetch_assoc($select_copyright_res); 


if(!empty($_POST['copyright'])){
    $copyright = $_POST['copyright'];

    $update_copyright = "UPDATE copyright SET copyright='$copyright' where id=1";
    mysqli_query($connect, $update_copyright);

    header('location:copyright.php?section=Copyright');
    $_SESSION['copyright_success'] = 'Copyright Text Updated';
}
else{
    header('location:copyright.php?section=Copyright');
    $_SESSION['copyright_err'] = 'You Cant Empty Copyright';
}