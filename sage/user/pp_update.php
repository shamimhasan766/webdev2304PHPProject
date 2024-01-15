<?php
require '../includes/login_check.php';
session_start();
require '../includes/db.php';
$logged_id =  $_SESSION['logged_id'];
$select_password = "SELECT * FROM users WHERE ID='$logged_id'";
$select_password_result = mysqli_query($connect, $select_password);
$after_password_assoc = mysqli_fetch_assoc($select_password_result);
$after_name = $after_password_assoc['NAME'];

if(isset($_FILES["profile_picture"])){
    if($_FILES["profile_picture"]["error"] == UPLOAD_ERR_OK){
                // Define the upload directory
                // Create the directory if it doesn't exist
                $uploadDir = $after_name.'/';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
        
                // Generate a unique filename for the uploaded file
                $fileName = uniqid($after_password_assoc['ID'], true) . "." . pathinfo($_FILES["profile_picture"]["name"], PATHINFO_EXTENSION);
        
                // Move the uploaded file to the upload directory
                $uploadPath = $uploadDir . $fileName;
                move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $uploadPath);
        
                header('location:profile_edit.php?section=Profile');
                $_SESSION['update_path'] = $uploadPath;
                $_SESSION['pc_success'] = 'Profile Picture Updated';
        
                // Update the user's profile with the new picture filename (you should replace this with your actual database update logic)
                $userId = $logged_id; // Replace with the actual user ID
                // Your database update query goes here, updating the profile_picture column for the user with $userId
        
                echo "Profile picture updated successfully!";
    }
    else{
        header('location:profile_edit.php?section=Profile');
        $_SESSION['pc_err'] = 'Please Choose Your Picture';
    }
}
else{
    
    $_SESSION['pc_err'] = 'Please Choose Your Picture';
}

// // Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Check if a file was uploaded without errors
//     if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] == UPLOAD_ERR_OK) {
//         // Define the upload directory
//         $uploadDir = "uploads/";
//         // Create the directory if it doesn't exist
//         if (!file_exists($uploadDir)) {
//             mkdir($uploadDir, 0777, true);
//         }

//         // Generate a unique filename for the uploaded file
//         $fileName = uniqid("profile_", true) . "." . pathinfo($_FILES["profile_picture"]["name"], PATHINFO_EXTENSION);

//         // Move the uploaded file to the upload directory
//         $uploadPath = $uploadDir . $fileName;
//         move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $uploadPath);

//         header('location:profile_edit.php');
//         $_SESSION['update_path'] = $uploadPath;
//         $_SESSION['pc_success'] = 'Profile Picture Updated';

//         // Update the user's profile with the new picture filename (you should replace this with your actual database update logic)
//         $userId = $logged_id; // Replace with the actual user ID
//         // Your database update query goes here, updating the profile_picture column for the user with $userId

//         echo "Profile picture updated successfully!";
//     } else {
//         header('location:profile_edit.php');
//     }
// }
?>
