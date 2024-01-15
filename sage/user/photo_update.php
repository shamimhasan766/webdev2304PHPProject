<?php
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$logged_id =  $_SESSION['logged_id'];
$select = "SELECT * FROM users WHERE ID='$logged_id'";
$select_res = mysqli_query($connect,$select);
$after_assoc = mysqli_fetch_assoc($select_res);

$photo = $_FILES['profile_picture'];

$after_explode = explode('.', $photo['name']);
$extension = end($after_explode);
$allowed_extention = ['jpg','png'];

if(in_array($extension,$allowed_extention)){
    if($photo['size'] <= 1000000){
        $filename = $after_assoc['NAME'].'.'.$extension;
    if($after_assoc['PHOTO'] != '17.jpg'){
        $delete = '../uploads/users/'.$after_assoc['PHOTO'];
        unlink($delete);
    }
        
        $newlocation = '../uploads/users/'.$filename;
        move_uploaded_file($photo['tmp_name'], $newlocation);

        $update = "UPDATE users SET PHOTO='$filename' WHERE ID='$logged_id'";
        mysqli_query($connect,$update);
        $_SESSION['pc_success'] = 'Profile Photo Update Successful';
        header('location:profile_edit.php?section=Profile');
    }
    else{
        $_SESSION['pc_err'] = 'Your Image have to less than 1MB';
        header('location:profile_edit.php?section=Profile');
    }
}
else {
    $_SESSION['pc_err'] = 'Only jpg and png file is allowed';
    header('location:profile_edit.php?section=Profile');
}