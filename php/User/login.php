<?php
include("../conn.php");
session_start();
$required = ['email', 'password'];
foreach($required as $require) {
    if (!isset($_POST[$require]) or empty($_POST[$require])){
        $_SESSION['error_required_signup'] = "$require is required";
        header('Location: ../../signup.php');
    }
}

$email = $_POST["email"];
$password = $_POST['password'];

$result = mysqli_query($conn, "SELECT * FROM customer WHERE email='$email'");
if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    if($row){
        $password_hashed = $row["login"];
        if($password_hashed == $password){
//            Succesfuly logged
            $_SESSION["user"]["data"] = [
                "name" => $row["name"],
                "email" => $email,
                "password" => $password
            ];
            $_SESSION["user"]["logged"] = true;

//            To verify email
            header('Location: ../../index.php');
        } else {
            die('no password');
        }
    }
} else {
    $_SESSION['error_required_signup'] = 'No email found!';
    header("Location: ../../login.php");
}
