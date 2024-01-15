<?php
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$logged_id =  $_SESSION['logged_id'];
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];


$select_password = "SELECT * FROM users WHERE ID='$logged_id'";
$select_password_result = mysqli_query($connect, $select_password);
$after_password_assoc = mysqli_fetch_assoc($select_password_result);

if(password_verify($current_password,$after_password_assoc["PASSWORD"])){
   if($new_password == $confirm_password){
    $after_hash = password_hash($new_password,PASSWORD_DEFAULT);
    $update = "UPDATE users SET PASSWORD='$after_hash' WHERE id=$logged_id";
    mysqli_query($connect,$update);
    $_SESSION['password_success'] = 'Password Update Success';
    header('location:profile_edit.php?section=Profile');
   }
   else{
    $_SESSION['wrong_new_password'] = 'Your Password did not matched';
    $_SESSION['new_password_val'] = $new_password;
    $_SESSION['confirm_password_val'] = $confirm_password;
    header('location:profile_edit.php?section=Profile');
   }
}
else{
    $_SESSION['wrong_password'] = 'You Enterd Wrong Password';
    $_SESSION['wrong_password_val'] = $current_password;
    header('location:profile_edit.php?section=Profile');
}

?>