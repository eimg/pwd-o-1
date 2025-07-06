<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MySQL);
$id = $table->insert([
    "name" => "Alice",
    "email" => "alice@gmail.com",
    "phone" => "32890243",
    "address" => "Some address",
    "password" => "password",
]);

if($id) {
    echo "Data insert successful";
}
