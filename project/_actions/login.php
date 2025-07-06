<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$email = $_POST['email'];
$password = $_POST['password'];

$table = new UsersTable(new MySQL);
$user = $table->find($email, $password);

if($user) {
    session_start();
    $_SESSION['user'] = $user;
    
    HTTP::redirect("/profile.php");
} else {
    HTTP::redirect("/index.php", "incorrect=login");
}
