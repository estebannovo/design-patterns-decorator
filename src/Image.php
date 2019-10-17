<?php

namespace Enovo;

class Image
{
    protected $path;
    private $width;
    private $height;
    /**
     * @var bool
     */
    private $grayscale;
    /**
     * @var bool
     */
    private $framed;

    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @param null $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @param null $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @param bool $grayscale
     */
    public function setGrayscale($grayscale)
    {
        $this->grayscale = $grayscale;
    }

    /**
     * @param bool $framed
     */
    public function setFramed($framed)
    {
        $this->framed = $framed;
    }

    public function draw(){
        $img =  imagecreatefromjpeg($this->path);

        if($this->width && $this->height){
            $img = imagescale($img, $this->width, $this->height);
        }

        if($this->grayscale){
            imagefilter($img, IMG_FILTER_GRAYSCALE);
        }

        if($this->framed){
            for ($i = 0; $i < $this->framed; $i++){
                imagerectangle($img, $i, $i, imagesx($img) - $i -1, imagesy($img) - $i - 1, imagecolorallocate($img, 255, 0, 0));
            }
        }

        return $img;
    }
}