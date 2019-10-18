<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/../vendor/autoload.php';

use Enovo\FramedDecorator;
use Enovo\GrayscaleDecorator;
use Enovo\ImagePng;
use Enovo\ResizeDecorator;

$image = new ImagePng(assets_path('img/offices.png'));
$image = new ResizeDecorator($image, 500, 333);
$image = new GrayscaleDecorator($image);
$image = new FramedDecorator($image, 10);

header('Content-Type: image/png');
\imagepng($image->draw());
