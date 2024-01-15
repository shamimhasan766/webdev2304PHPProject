<?php
session_start();
require 'includes/db.php';

$password = $_POST['password'];


$flag = false;

// email starts

$email = $_POST['email'];
if(empty($email)){
    $flag = true;
    $_SESSION['email_eror'] = 'Please Enter Your Email';
}
else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $flag = true;
        $_SESSION['email_eror'] = 'Invalid Email Format';
        $_SESSION['email_value'] = $email;
    }
    else{
        $select_email = "SELECT COUNT(*) as total FROM users WHERE EMAIL='$email'";
        $select_email_result = mysqli_query($connect, $select_email);
        $after_email_assoc = mysqli_fetch_assoc($select_email_result);
        if($after_email_assoc["total"] == 1){
            $select_password = "SELECT * FROM users WHERE EMAIL='$email'";
            $select_password_result = mysqli_query($connect, $select_password);
            $after_password_assoc = mysqli_fetch_assoc($select_password_result);
            echo $after_password_assoc["PASSWORD"];
            if(password_verify($password, $after_password_assoc["PASSWORD"])){
                $_SESSION['useremail'] = $email;
                $_SESSION['login_message'] = 'ok';
                $_SESSION['logged_in'] = 'login done';
                $_SESSION['logged_id'] = $after_password_assoc["ID"];
                header("location:admin.php");
            }
            else{
                $flag = true;
                $_SESSION['password_eror'] = 'wrong password';
                $_SESSION['email_value']= $email;
            }
        }
        else{
            $_SESSION['email_value']= $email;
            $_SESSION['email_eror'] = 'email does not matched';
            $flag = true;
        }
        
    }
    
}


// email ends


// password starts



$after_hash = password_hash($password, PASSWORD_DEFAULT);

 $upper = preg_match('@[A-Z]@',$password);
 $lower = preg_match('@[a-z]@',$password);
 $num = preg_match('@[0-9]@',$password);
 $special = preg_match('@[$,&,#,*,=,(,),+,!]@',$password);
 
 $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 
 $pass_validated = preg_match($password_regex, $password);
 
 if(empty($password)){
     $flag = true;
     $_SESSION['password_eror'] = 'Please Input Your Password';
 }
 else{
    if(!$pass_validated){
        $flag = true;
        $_SESSION['password_eror'] = 'Password Must Have 1 Lowercase,Uppercase,number and minimum 8 charecters';
        $_SESSION['password_value'] = $password;
    }
    else{
        
        $_SESSION['password_value'] = $password;
    }
    
}

//  password ends


if($flag){
    header('location:login.php');
}
else{

}

?>