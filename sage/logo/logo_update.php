<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$btn =$_POST['btn'];
echo $btn;
if($btn == 1){
    $header_logo = $_FILES['header_logo'];
    if($header_logo['type'] == 'image/png'){
        if($header_logo['size'] = 10000000){
            $delete_form = '../uploads/logo/header_logo.png';
            unlink($delete_form);

            $delete_header_text = "UPDATE logos SET header_text=NULL where id=1";
            mysqli_query($connect, $delete_header_text);
            $newlocation = '../uploads/logo/header_logo.png';
            move_uploaded_file($header_logo['tmp_name'],$newlocation);
            
            $update = "UPDATE logos SET header_logo='header_logo.png'";
            mysqli_query($connect,$update);
            header('location:logo.php?section=Logo');
            $_SESSION['header_logo_success'] = 'Header Logo Updated';
        }
        else{
            header('location:logo.php?section=Logo');
            $_SESSION['logo_err'] = 'File must be less than 1 MB';
        }
    }
    else{
    header('location:logo.php?section=Logo');
    $_SESSION['logo_err'] = 'Only png format is allowed';
    }
}
else if($btn == 2){
    $footer_logo = $_FILES['footer_logo'];
    if($footer_logo['type'] == 'image/png'){
        if($footer_logo['size'] = 10000000){
            $delete_form = '../uploads/logo/footer_logo.png';
            unlink($delete_form);

            $delete_footer_text = "UPDATE logos SET footer_text=NULL where id=1";
            mysqli_query($connect, $delete_footer_text);
            $newlocation = '../uploads/logo/footer_logo.png';
            move_uploaded_file($footer_logo['tmp_name'],$newlocation);
            
            $update = "UPDATE logos SET footer_logo='footer_logo.png'";
            mysqli_query($connect,$update);
            header('location:logo.php?section=Logo');
            $_SESSION['footer_logo_success'] = 'Footer Logo Updated';
        }
        else{
            header('location:logo.php?section=Logo');
            $_SESSION['logo_err_footer'] = 'File must be less than 1 MB';
        }
    }
    else{
    header('location:logo.php?section=Logo');
    $_SESSION['logo_err_footer'] = 'Only png format is allowed';
    }
}
else if($btn == 3){
    $header_logo_text = $_POST['header_logo_text'];

            $delete_form = '../uploads/logo/header_logo.png';
            unlink($delete_form);

            $update_header_text = "UPDATE logos SET header_text='$header_logo_text' where id=1";
            mysqli_query($connect, $update_header_text);

            $update = "UPDATE logos SET header_logo=NULL ";
            mysqli_query($connect,$update);
            header('location:logo.php?section=Logo');
            $_SESSION['header_text_logo_success'] = 'Header Logo Updated';
            $_SESSION['active'] = 'active';

}
else if($btn == 4){
    $footer_logo_text = $_POST['footer_logo_text'];

            $delete_form = '../uploads/logo/footer_logo.png';
            unlink($delete_form);

            $update_footer_text = "UPDATE logos SET footer_text='$footer_logo_text' where id=1";
            mysqli_query($connect, $update_footer_text);

            $update = "UPDATE logos SET footer_logo=NULL ";
            mysqli_query($connect,$update);
            header('location:logo.php?section=Logo');
            $_SESSION['footer_text_logo_success'] = 'Footer Logo Updated';
            $_SESSION['active'] = 'active';

}


?>