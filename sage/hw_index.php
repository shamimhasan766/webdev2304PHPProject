<?php
require './includes/login_check.php';
session_start();
require 'includes/db.php';


$flag = false;


// name starts
$name = $_POST['name'];

if (empty($name)) {
    $flag = true;
    $_SESSION['name_eror'] = 'Please Input Your Name';
} else {
    $_SESSION['name_value'] = $name;
}
// name ends


// email starts
$email = $_POST['email'];

if (empty($email)) {
    $flag = true;
    $_SESSION['email_eror'] = 'Please Enter Your Email';
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $flag = true;
        $_SESSION['email_eror'] = 'Invalid Email Format';
        $_SESSION['email_value'] = $email;
    } else {
        $select_email = "SELECT COUNT(*) as total FROM users WHERE email='$email'";
        $select_email_result = mysqli_query($connect, $select_email);
        $after_email_assoc = mysqli_fetch_assoc($select_email_result);
        if ($after_email_assoc["total"] == 1) {
            $flag = true;
            $_SESSION['email_eror'] = 'Email Already Exist';
            $_SESSION['email_value'] = $email;
        } else {
            $_SESSION['email_value'] = $email;
        }
    }
}
// email ends


// password starts
$password = $_POST['password'];

$after_hash = password_hash($password, PASSWORD_DEFAULT);

$password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
$pass_validated = preg_match($password_regex, $password);

if (empty($password)) {
    $flag = true;
    $_SESSION['password_eror'] = 'Please Input Your Password';
} else {
    if (!$pass_validated) {
        $flag = true;
        $_SESSION['password_eror'] = 'Password Must Have 1 Lowercase,Uppercase,number and minimum 8 charecters';
        $_SESSION['password_value'] = $password;
    } else {
        $_SESSION['password_value'] = $password;
    }
}
// password ends


// country starts
$country = $_POST['country'];

if (empty($country)) {
    $flag = true;
    $_SESSION['country_eror'] = 'Please Select Your Country';
} else {
    $_SESSION['country_value'] = $country;
}
// country ends


// gender starts
$gender = $_POST['gender'];

if (empty($gender)) {
    $flag = true;
    $_SESSION['gender_eror'] = 'Please Select Your Gender';
} else {
    $_SESSION['gender_value'] = $gender;
}
// gender ends

// textarea Starts
$text = $_POST['text'];

if (empty($text)) {
    $flag = true;
    $_SESSION['text_eror'] = 'Please Text Something About Yourself';
} else {
    if (str_word_count($text) < 3) {
        $flag = true;
        $_SESSION['text_eror'] = 'Minimum 3 Word And Maximum 20 Word Is Allowed';
        $_SESSION['text_value'] = $text;
    } else {
        $_SESSION['text_value'] = $text;
    }
    if (str_word_count($text) > 20) {
        $flag = true;
        $_SESSION['text_eror'] = 'Minimum 5 Word And Maximum 20 Word Is Allowed';
        $_SESSION['text_value'] = $text;
    } else {
        $_SESSION['text_value'] = $text;
    }
}
// textarea ends



// Hobbies
$hobbies = $_POST['hobbies'];

$after_print = implode(",", $hobbies);;


if (empty($hobbies)) {
    $flag = true;
    $_SESSION['hobbies_eror'] = 'Please Select Your Hobbies';
} else {
    $_SESSION['hobbies_val'] = $hobbies;
}


// hobbies ends

if ($flag) {
    header('location:hw.php');
} else {
    $insert = "INSERT INTO users(NAME, EMAIL, PASSWORD, COUNTRY, GENDER, ABOUT, HOBBIES)VALUES('$name', '$email', '$after_hash', '$country', '$gender', '$text', '$after_print')";

    mysqli_query($connect, $insert);

    header("location:hw.php");

    $_SESSION['success'] = 'Your Registration Succesfully Completed Go To Login Page';
}
