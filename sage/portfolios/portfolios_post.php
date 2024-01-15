<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$btn =$_POST['btn'];
$portfolios = "SELECT * FROM portfolios WHERE id=1";
$portfolios_res = mysqli_query($connect,$portfolios);
$portfolios_res_assoc = mysqli_fetch_assoc($portfolios_res);


if($btn == 1){
    $heading = $_POST['heading'];

    $update_heading = "UPDATE portfolios SET heading='$heading'";
    mysqli_query($connect, $update_heading);

    header('location:portfolios.php?section=Portfolios');
    $_SESSION['heading_success'] = 'Portfolios Section Heading Updated';
}
else if($btn == 2){
    $photo = $_FILES['image'];
    $work_name = $_POST['name'];
    $work_title = $_POST['title'];
    $link = $_POST['link']??NULL;

    $after_explode = explode('.', $photo['name']);
    $extension = end($after_explode);
    $allowed_extention = ['jpg','png','jpeg'];
    if(in_array($extension, $allowed_extention)){
        if($intro_img['size'] = 20000000){
            if(!empty($work_name) && !empty($work_title)){ 
                $file_name = uniqid().'.'.$extension;
                $file_dir = '../uploads/portfolios/'.$file_name;
    
                $insert_portfolios = "INSERT INTO portfolios (image, name, title, link) VALUES ('$file_name', '$work_name','$work_title','$link')";
                mysqli_query($connect, $insert_portfolios);
                $newlocation = $file_dir;
                move_uploaded_file($photo['tmp_name'],$newlocation);
                
                header('location:portfolios.php?section=Portfolios');
                $_SESSION['portfolio_success'] = 'Portfolio Added';
            
                }
                else{
                    header('location:portfolios.php?section=Portfolios');
                    $_SESSION['portfolio_err'] = 'You Have to fill Name And Title Both';
                    $_SESSION['name_val'] = $work_name;
                    $_SESSION['title_val'] = $work_title;
                }
        }
        else{
            header('location:portfolios.php?section=Portfolios');
            $_SESSION['img_err'] = 'File must be less than 2 MB';
            $_SESSION['name_val'] = $work_name;
            $_SESSION['title_val'] = $work_title;
        }
    }
    else{
        header('location:portfolios.php?section=Portfolios');
        $_SESSION['img_err'] = 'Only png/jpg/jpeg format is allowed';
        $_SESSION['name_val'] = $work_name;
        $_SESSION['title_val'] = $work_title;
    }
}