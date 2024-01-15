<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$btn =$_POST['btn'];


$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);


$insert = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email','$subject','$message')";
mysqli_query($connect,$insert);

header('location:/class11/sage/index.php#messages');
$_SESSION['message_success'] = 'Message Sent Successfully';