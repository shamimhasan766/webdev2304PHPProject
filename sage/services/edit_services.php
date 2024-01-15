<?php 
require '../includes/login_check.php';
session_start();
require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['values'])) {
    $id = $_POST['id'];
    $values = $_POST['values'];

    // Assuming you have columns named name, email, subject, message in your table
    $query = "UPDATE services SET service_title = '$values[0]', service_description = '$values[1]' WHERE id = $id";
    mysqli_query($connect,$query);
} else {
    echo "Invalid request";
}
?>