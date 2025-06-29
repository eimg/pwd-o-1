<?php

include("../vendor/autoload.php");

use Helpers\HTTP;
use Helpers\Auth;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Faker\Factory as Faker;

HTTP::redirect();
Auth::check();

$db = new MySQL;
$db->connect();

$table = new UsersTable;
$table->insert();

$faker = Faker::create();
echo $faker->name;
