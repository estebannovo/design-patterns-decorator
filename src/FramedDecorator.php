<?php

namespace Enovo;

class FramedDecorator extends Image
{
    protected $thickness;

    protected function __construct($filename, $thickness )
    {
        parent::__construct($filename);

        $this->thickness = $thickness;
    }

    public function draw()
    {
        $img = parent::draw();

        for ($i = 0; $i < $this->thickness; $i++){
            imagerectangle($img, $i, $i, imagesx($img) - $i -1, imagesy($img) - $i - 1, imagecolorallocate($img, 255, 0, 0));
        }

        return $img;
    }
}