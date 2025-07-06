<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
use Helpers\Auth;

$user = Auth::check();

$name = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$type = $_FILES['photo']['type'];

if($type == "image/jpeg" or $type == "image/png") {
    move_uploaded_file($tmp_name, "photos/$name");

    $user->photo = $name;

    $table = new UsersTable(new MySQL);
    $table->updatePhoto($user->id, $name);

    HTTP::redirect("/profile.php");
} else {
    HTTP::redirect("/profile.php", "error=type");
}
