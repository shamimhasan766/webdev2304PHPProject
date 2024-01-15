<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$btn =$_POST['btn'];
echo $btn;
$intros = "SELECT * FROM intros WHERE id=1";
$intros_res = mysqli_query($connect,$intros);
$intros_res_assoc = mysqli_fetch_assoc($intros_res);

if($btn == 1){
    $intro_img = $_FILES['intro_img'];

    $after_explode = explode('.', $intro_img['name']);
    $extension = end($after_explode);
    $allowed_extention = ['jpg','png','jpeg'];
    if(in_array($extension, $allowed_extention)){
        if($intro_img['size'] = 20000000){
            $file_dir = '../uploads/intro/intro_img.'.$extension;
            $file_name = 'intro_img.'.$extension;
            $unlink_dir = '../uploads/intro/'.$intros_res_assoc['intro_img'];
            unlink($unlink_dir);

            $delete_intro_img = "UPDATE intros SET intro_img='$file_name' where id=1";
            mysqli_query($connect, $delete_intro_img);
            $newlocation = $file_dir;
            move_uploaded_file($intro_img['tmp_name'],$newlocation);
            
            $update = "UPDATE intros SET intro_img='$file_name'";
            mysqli_query($connect,$update);
            header('location:intro.php?section=Intro');
            $_SESSION['intro_img_success'] = 'Intro Image Updated';
        }
        else{
            header('location:intro.php?section=Intro');
            $_SESSION['img_err'] = 'File must be less than 2 MB';
        }
    }
    else{
        header('location:intro.php?section=Intro');
        $_SESSION['img_err'] = 'Only png/jpg/jpeg format is allowed';
    }
}
else if($btn == 2){
    $title = $_POST['title'];

    $update_title = "UPDATE intros SET title='$title' where id=1";
    mysqli_query($connect, $update_title);

    header('location:intro.php?section=Intro');
    $_SESSION['title_success'] = 'Intro Title Updated';
}
else if($btn == 3){
    $name = $_POST['name'];

    $update_name = "UPDATE intros SET name='$name' where id=1";
    mysqli_query($connect, $update_name);

    header('location:intro.php?section=Intro');
    $_SESSION['name_success'] = 'Intro Name Updated';
}
else if($btn == 4){
    $description = $_POST['description'];

    $update_description = "UPDATE intros SET description='$description' where id=1";
    mysqli_query($connect, $update_description);

    header('location:intro.php?section=Intro');
    $_SESSION['description_success'] = 'Intro Description Updated';
}
else if($btn == 5){
    $button = $_POST['button'];

    $update_button = "UPDATE intros SET button='$button' where id=1";
    mysqli_query($connect, $update_button);

    header('location:intro.php?section=Intro');
    $_SESSION['button_success'] = 'Intro Button Text Updated';
}
else if($btn == 6){
    $watermark = $_POST['watermark'];

    $update_watermark = "UPDATE intros SET watermark='$watermark' where id=1";
    mysqli_query($connect, $update_watermark);

    header('location:intro.php?section=Intro');
    $_SESSION['watermark_success'] = 'Intro Watermark Text Updated';
}