<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$btn =$_POST['btn'];
$skills = "SELECT * FROM skills WHERE id=1";
$skills_res = mysqli_query($connect,$skills);
$skills_res_assoc = mysqli_fetch_assoc($skills_res);


if($btn == 1){
    $name = $_POST['name'];

    $update_name = "UPDATE skills SET name='$name'";
    mysqli_query($connect, $update_name);

    header('location:skills.php?section=Skills');
    $_SESSION['name_success'] = 'Skills Section Heading Updated';
}
else if($btn == 2){
    $skill_title = strtoupper($_POST['title']);
    $skill_rate = $_POST['rate'];

    $insert_skill = "INSERT INTO skills (skill_title, skill_rate) VALUES ('$skill_title', '$skill_rate')";
    mysqli_query($connect, $insert_skill);

    header('location:skills.php?section=Skills');
    $_SESSION['skill_success'] = 'Skills Added';
}