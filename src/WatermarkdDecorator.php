<?php

namespace Enovo;

class WatermarkdDecorator extends ImageDecorator
{
    private $stampFilename;

    public function __construct(Image $image, $stampFilename)
    {
        parent::__construct($image);

        $this->stampFilename = $stampFilename;
    }

    public function draw()
    {
        $img =  parent::draw();

        $stamp = imagecreatefrompng($this->stampFilename);

        // Set margins
        $marginRight = 10;
        $marginLeft = 10;

        $stampWidth = imagesx($stamp);
        $stampHeight = imagesy($stamp);

        // Copy stamp on the image
        imagecopy($img, $stamp, imagesx($img) - $stampWidth - $marginRight, imagesy($img) - $stampHeight - $marginLeft, 0, 0, $stampWidth, $stampHeight);

        return $img;
    }
}