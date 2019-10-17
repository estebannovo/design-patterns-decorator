<?php

namespace Enovo;

class GrayscaleDecorator extends Image
{
    public function __construct($filename)
    {
        parent::__construct($filename);
    }

    public function draw()
    {
        $img =  parent::draw();

        imagefilter($img, IMG_FILTER_GRAYSCALE);

        return $img;
    }
}