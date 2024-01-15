<?php 
require '../includes/login_check.php';
session_start();

$id = $_POST['id'];
require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['values'])) {
    $id = $_POST['id'];
    $values = $_POST['values'];

    // Assuming you have columns named name, email, subject, message in your table
    $query = "UPDATE menu SET menu = '$values[0]', link = '$values[1]' WHERE id = $id";
    mysqli_query($connect,$query);
} else {
    echo "Invalid request";
}
?>