<?php

namespace Enovo;

class ImagePng implements Image
{
    protected $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function draw(){
        return imagecreatefrompng($this->path);
    }
}