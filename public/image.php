<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/../vendor/autoload.php';

use Enovo\ImageJpeg;

$image = ImageJpeg::make(assets_path('img/decorator.jpeg'), 500, 333, true, 10);

header('Content-Type: image/jpeg');
imagejpeg($image->draw());
