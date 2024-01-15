<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$id = $_GET['id'];


$query = "SELECT * FROM portfolios WHERE id = $id";
$result = mysqli_query($connect, $query);
$after_assoc = mysqli_fetch_assoc($result);

if($after_assoc['status']==1){
    $query = "UPDATE portfolios SET status=0 WHERE id=$id";
    mysqli_query($connect, $query);
    header('location:portfolios.php?section=Portfolios');
}else{
    $query = "UPDATE portfolios SET status=1 WHERE id=$id";
    mysqli_query($connect, $query);
    header('location:portfolios.php?section=Portfolios');
}
