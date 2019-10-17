<?php

namespace Enovo;

class GrayscaleDecorator
{
    /**
     * @var FramedDecorator|GrayscaleDecorator|Image|ResizeDecorator
     */
    protected $image;

    public function __construct($filename)
    {
        $this->image =  Image::make($filename);
    }

    public function draw()
    {
        $img =  $this->image->draw();

        imagefilter($img, IMG_FILTER_GRAYSCALE);

        return $img;
    }
}