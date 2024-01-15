<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$btn =$_POST['btn'];
$testimonials = "SELECT * FROM testimonial WHERE id=1";
$testimonials_res = mysqli_query($connect,$testimonials);
$testimonials_res_assoc = mysqli_fetch_assoc($testimonials_res);



if($btn == 1){
    $heading = $_POST['heading'];

    $update_heading = "UPDATE testimonial SET heading='$heading'";
    mysqli_query($connect, $update_heading);

    header('location:testimonial.php?section=Testimonial');
    $_SESSION['heading_success'] = 'Testimonials Section Heading Updated';
}
else if($btn == 2){
    $client_img = $_FILES['image'];
    $comment = htmlspecialchars($_POST['comment']);
    $client_name = htmlspecialchars($_POST['name']);
    $client_title = htmlspecialchars($_POST['title']);

    $after_explode = explode('.', $client_img['name']);
    $extension = end($after_explode);
    $allowed_extention = ['jpg','png','jpeg'];
    if(in_array($extension, $allowed_extention)){
        if($client_img['size'] = 20000000){
            if(!empty($comment) && !empty($client_name) && !empty($client_title)){ 
                $file_name = uniqid().'.'.$extension;
                $file_dir = '../uploads/testimonial/'.$file_name;
    
                $insert_testimonial = "INSERT INTO testimonial (comment,image, name, title) VALUES ('$comment','$file_name', '$client_name','$client_title')";
                mysqli_query($connect, $insert_testimonial);
                $newlocation = $file_dir;
                move_uploaded_file($client_img['tmp_name'],$newlocation);
                
                header('location:testimonial.php?section=Testimonial');
                $_SESSION['testimonial_success'] = 'Testimonial Added';
            
                }
                else{
                    header('location:testimonial.php?section=Testimonial');
                    $_SESSION['testimonial_err'] = 'You Have to fill All The Field';
                    $comment['comment'] = $_POST['comment'];
                    $_SESSION['name_val'] = $client_name;
                    $_SESSION['title_val'] = $client_title;
                }
        }
        else{
            header('location:testimonial.php?section=Testimonial');
            $_SESSION['img_err'] = 'File must be less than 2 MB';
        }
    }
    else{
        header('location:testimonial.php?section=Testimonial');
        $_SESSION['img_err'] = 'Only png/jpg/jpeg format is allowed';
    }
    
}