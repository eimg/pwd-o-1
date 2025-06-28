<?php

include("vendor/autoload.php");

use Libs\Math\Circle;
use Support\Database;
use Carbon\Carbon;

$c = new Circle;
$c->area(80);

$db = new Database;
$db->connect();

echo Carbon::now()->addDay(5);
