<?php
require '../includes/login_check.php';
session_start();
require '../includes/db.php';

$id = $_GET['id'];
$name = $_GET['name'];

$select = "SELECT * FROM users WHERE ID=$id";
$select_res = mysqli_query($connect, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

if($after_assoc['PHOTO'] != '17.jpg'){
    $delete = '../uploads/users/'.$after_assoc['PHOTO'];
    unlink($delete);
}


$delete = "DELETE FROM users WHERE ID=$id";
mysqli_query($connect,$delete);


$_SESSION['delete'] = "User '$name' Deleted Successfully";
header('location:users.php?section=User List');