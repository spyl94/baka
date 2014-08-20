<?php

namespace Spyl\Bundle\BakaBundle\Reader;

use Symfony\Component\Finder\Finder;
use Spyl\Bundle\BakaBundle\Model\Content;

class PageReader
{

    private $uploadDir;

    public function __construct($uploadDir)
    {
        $this->uploadDir = $uploadDir;
    }

    public function listPages(Content $content)
    {
        $finder = new Finder();
        
        $dir = $this->uploadDir . DIRECTORY_SEPARATOR . $content->getManga()->getName() . DIRECTORY_SEPARATOR . $content->getName();

        return $finder->files()->in($dir);;
    }
}