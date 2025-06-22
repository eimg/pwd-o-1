<?php

$email = $_POST['email'];
$password = $_POST['password'];

if($email == "alice@gmail.com" and $password == "password") {
    session_start();
    $_SESSION['user'] = ['name' => 'Alice'];
    header("location: ../profile.php");
} else {
    header("location: ../index.php?incorrect=login");
}
