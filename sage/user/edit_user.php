<?php 
require '../includes/login_check.php';
session_start();
$id = $_POST['id'];
require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['values'])) {
    $id = $_POST['id'];
    $values = $_POST['values'];


    // Assuming you have columns named name, email, subject, message in your table
    $query = "UPDATE users SET NAME = '$values[0]', EMAIL = '$values[1]', COUNTRY = '$values[2]', GENDER = '$values[3]', ABOUT='$values[4]', HOBBIES = '$values[5]', ROLE='$values[6]' WHERE id = $id";
    mysqli_query($connect,$query);
} else {
    echo "Invalid request";
}
?>