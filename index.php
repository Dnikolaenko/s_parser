<?php
require_once __DIR__ . "/vendor/autoload.php";

$config = new App\Config();
$parser = new App\Parser($config);
$parser->index();
?>
