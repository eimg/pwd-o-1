<?php

include("autoload.php");

use Libs\Math\Circle;
use Support\Database;

$circle = new Circle;
$circle->area(10);

$db = new Database;
$db->connect();
