<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/../vendor/autoload.php';

use Enovo\Image;

$image = new Image(assets_path('img/decorator.jpeg'), 1000, 667, true, 2);

header('Content-Type: image/jpeg');
imagejpeg($image->draw());
