<?php
USE App\App;


include 'autoload.php';
include 'web.php';
include 'App/Helpers/Helpers.php';

$app = new App();
$app->run();

?>