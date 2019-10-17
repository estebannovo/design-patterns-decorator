<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/../vendor/autoload.php';

use Enovo\Image;

$image = new Image(assets_path('img/decorator.jpeg'));
$image->setWidth(1000);
$image->setHeight(667);
$image->setGrayscale(true);
$image->setFramed(2);

header('Content-Type: image/jpeg');
imagejpeg($image->draw());
