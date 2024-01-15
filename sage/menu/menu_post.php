<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$btn =$_POST['btn'];





if(isset($btn)){
    $menu = ucwords($_POST['name']);
    $link = $_POST['link'];

    if(!empty($menu)){ 
        $insert_menu = "INSERT INTO menu (menu, link) VALUES ('$menu', '$link')";
        mysqli_query($connect, $insert_menu);

        header('location:menu.php?section=Menu Bar');
        $_SESSION['menu_success'] = 'Menu Added';
    }
    else{
        header('location:menu.php?section=Menu Bar');
        $_SESSION['menu_err'] = 'You Cant Keep Empty Name Field';
        $_SESSION['menu_val'] = $_POST['name'];
        $_SESSION['link_val'] = $_POST['link'];
    }
}