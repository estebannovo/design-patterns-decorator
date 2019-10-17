<?php

namespace Enovo;

class Image
{
    protected $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public static function make($path, $width =  null, $height = null, $grayscale = false, $framed = false)
    {
        if($width && $height){
            return new ResizeDecorator($path, $width, $height);
        }

        if($grayscale){
            return new GrayscaleDecorator($path, $grayscale);
        }

        if($framed){
            return new FramedDecorator($path, $framed);
        }

        return new static($path);
    }

    public function draw(){
        $img =  imagecreatefromjpeg($this->path);

        return $img;
    }
}