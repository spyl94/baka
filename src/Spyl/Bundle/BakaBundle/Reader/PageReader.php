<?php

namespace Spyl\Bundle\BakaBundle\Reader;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Routing\RouterInterface;
use Spyl\Bundle\BakaBundle\Model\Content;

class PageReader
{
    private $uploadPath;
    private $uploadDir;
    private $router;

    public function __construct($uploadPath, $uploadDir, RouterInterface $router)
    {
        $this->uploadPath = $uploadPath;
        $this->uploadDir = $uploadDir;
        $this->router = $router;
    }

    public function listPages(Content $content = null)
    {
        if ($content == null) {
            return [];
        }

        $finder = new Finder();

        $path =  $content->getManga()->getName() . DIRECTORY_SEPARATOR . $content->getName();
        $dir = $this->uploadDir . DIRECTORY_SEPARATOR . $path;

        $context = $this->router->getContext();
        $host = $context->getScheme().'://'.$context->getHost();

        $pages = [];
        try {
            $finder->files()->in($dir);
            foreach ($finder as $file) {
                $pages[] = $host . '/' . $this->uploadPath . '/' . $path . '/' . $file->getRelativePathname();
           }
            return $pages;
        } catch (\Exception $e) {
            return [];
        }
    }
}
