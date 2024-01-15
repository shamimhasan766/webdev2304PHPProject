<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$btn =$_POST['btn'];
$services = "SELECT * FROM services WHERE id=1";
$services_res = mysqli_query($connect,$services);
$services_res_assoc = mysqli_fetch_assoc($services_res);


if($btn == 1){
    $name = $_POST['name'];

    $update_name = "UPDATE services SET name='$name'";
    mysqli_query($connect, $update_name);

    header('location:services.php?section=Services');
    $_SESSION['name_success'] = 'Services Section Heading Updated';
}
else if($btn == 2){
    $service_title = $_POST['title'];
    $service_des = $_POST['description'];
    if(!empty($service_title) && !empty($service_des)){ 

    $insert_service = "INSERT INTO services (service_title, service_description) VALUES ('$service_title', '$service_des')";
    mysqli_query($connect, $insert_service);

    header('location:services.php?section=Services');
    $_SESSION['service_success'] = 'Service Added';

    }
    else{
        header('location:services.php?section=Services');
        $_SESSION['service_err'] = 'You Have to fill Name And Description Section Both';
        $_SESSION['title_val'] = $service_title;
        $_SESSION['des_val'] = $service_des;
    }
}
else if($btn == 3){
    $footer_intro_ini = $_POST["footer_intro"];
    $footer_intro = htmlspecialchars($footer_intro_ini);
    $footer_button = $_POST['footer_button'];

    $footer_update = "UPDATE services SET footer_intro='$footer_intro', footer_button='$footer_button'";
    mysqli_query($connect, $footer_update);

    header('location:services.php?section=Services');
    $_SESSION['footer_update'] = 'Services Section Footer Updated';
}