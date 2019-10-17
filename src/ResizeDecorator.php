<?php

namespace Enovo;

class ResizeDecorator extends Image
{
    protected $width;
    protected $height;

    public function __construct($filename, $width, $height)
    {
        parent::__construct($filename);
        $this->width = $width;
        $this->height = $height;
    }

    public function draw()
    {
        $img = parent::draw();

        if($this->width && $this->height){
            $img = imagescale($img, $this->width, $this->height);
        }

        return $img;
    }

}