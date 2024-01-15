<?php
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$logged_id =  $_SESSION['logged_id'];
$name = $_POST['name'];
$country = $_POST['country'];
$gender = $_POST['gender'];
$text = $_POST['text'];
$hobbies = $_POST['hobbies'];
$array_hobbies = implode(',',$hobbies);

$update = "UPDATE users SET NAME='$name', COUNTRY='$country', GENDER='$gender', ABOUT='$text', HOBBIES='$array_hobbies' WHERE id=$logged_id";
mysqli_query($connect,$update);
$_SESSION['update_success'] = 'Profile Update Success';
header('location:profile_edit.php?section=Profile');
?>