<?php

include("../vendor/autoload.php");

use Helpers\HTTP;

HTTP::redirect("/index.php", "http=test");
