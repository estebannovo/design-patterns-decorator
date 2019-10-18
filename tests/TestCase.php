<?php

namespace Enovo\Tests;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function snapshotsPath($filename)
    {
        return __DIR__.'/snapshots/'.$filename;
    }
}