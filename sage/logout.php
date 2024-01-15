<?php
session_start();
unset($_SESSION['logged_in']);

header('location:login.php');
$_SESSION['logout_message'] = 'logout';


?>