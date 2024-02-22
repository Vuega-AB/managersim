<?php
    include ("./conn.php");
    session_start();
    $required = ['email', 'password', 'name'];
    foreach($required as $require) {
        if (!isset($_POST[$require]) or empty($_POST[$require])){
            $_SESSION['error_required_signup'] = "$require is required";
            header('Location: ../signup.php');
        }
    }

    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $name = $_POST["name"];

//    Check for email in database

    $result = mysqli_query($conn, "SELECT * FROM customer WHERE email='$email'");
    if (mysqli_num_rows($result) > 0) {
//        Email already used
        $_SESSION['error_required_signup'] = 'This email is already used!';
        header('Location: ../signup.php');
    } else {
//        Register the email
        $result = mysqli_query($conn, "INSERT INTO customer(login, email, realname) VALUES
                                                 ('$password', '$email', '$name')");
        if ($result){
            $_SESSION["user"]["data"] = [
                "name" => $name,
                "email" => $email,
                "password" => $password
            ];
            $_SESSION["user"]["logged"] = true;
            header('Location: ../index.php');
        }
    }
