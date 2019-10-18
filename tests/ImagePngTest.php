<?php

namespace Enovo\Tests;

use Enovo\FramedDecorator;
use Enovo\GrayscaleDecorator;
use Enovo\ImagePng;
use Enovo\ResizeDecorator;
use Enovo\WatermarkdDecorator;

class ImagePngTest extends TestCase
{
    private static $baseImagename = 'img/offices.png';
    /** @test */
    function it_can_draw_an_image()
    {
        $image = new ImagePng(assets_path(static::$baseImagename));
        $this->assertImageEquals('basic-image.png', $image);
    }

    /** @test */
    function it_can_draw_an_resized_image()
    {
        $image = new ImagePng(assets_path(static::$baseImagename));
        $image = new ResizeDecorator($image, 500, 333);

        $this->assertImageEquals('resized-image.png', $image);
    }

    /** @test */
    function it_can_draw_an_grayscale_image()
    {
        $image = new ImagePng(assets_path(static::$baseImagename));
        $image = new GrayscaleDecorator($image);

        $this->assertImageEquals('grayscale-image.png', $image);
    }

    /** @test */
    function it_can_draw_an_framed_image()
    {
        $image = new ImagePng(assets_path(static::$baseImagename));
        $image = new FramedDecorator($image, 5);

        $this->assertImageEquals('framed-image.png', $image);
    }

    /** @test */
    function it_can_draw_a_resized_grayscale_framed_image()
    {
        //$this->markTestIncomplete('Cannot apply multiple filters using inheritance');
        $image = new ImagePng(assets_path(static::$baseImagename));
        $image = new ResizeDecorator($image, 500, 333);
        $image = new GrayscaleDecorator($image);
        $image = new FramedDecorator($image, 10);

        $this->assertImageEquals('resized_grayscale_framed-image.png', $image);
    }

    /** @test */
    function it_can_draw_a_watermkark_image()
    {
        $image = new ImagePng(assets_path(static::$baseImagename));
        $image = new WatermarkdDecorator($image, assets_path('img/styde.png'));

        $this->assertImageEquals('watermarked-image.png', $image);
    }

    protected function assertImageEquals($filename, $image)
    {
        if (! file_exists($this->snapshotsPath($filename))){
            \imagepng($image->draw(), $this->snapshotsPath($filename));
            $this->markTestIncomplete("The snapshot [{$filename}] didn't exist and was created");
        }

        \imagepng($image->draw(), storage_path($filename));

        $this->assertTrue(
            file_get_contents($this->snapshotsPath($filename)) === file_get_contents(storage_path($filename)),
            "The drawn image does not match the expected image [{$filename}]"
        );
    }
}