<?php

namespace Enovo;

class GrayscaleDecorator implements Image
{
    /**
     * @var FramedDecorator|GrayscaleDecorator|ImageJpeg|ResizeDecorator
     */
    protected $image;

    public function __construct(Image $image)
    {
        $this->image =  $image;
    }

    public function draw()
    {
        $img =  $this->image->draw();

        imagefilter($img, IMG_FILTER_GRAYSCALE);

        return $img;
    }
}