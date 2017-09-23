<?php

//require_once __DIR__ . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR ."bootstrap.php";
require_once __DIR__ . "/vendor/autoload.php";

$pew = new App\Parser("Begin");
//echo $pew->message;
$pew->index();

?>