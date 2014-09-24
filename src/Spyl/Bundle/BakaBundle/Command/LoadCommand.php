<?php

namespace Spyl\Bundle\BakaBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;

use Spyl\Bundle\BakaBundle\Model\Manga;
use Spyl\Bundle\BakaBundle\Model\Content;


class LoadCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('baka:load')
            ->setDescription('Load your mangas files into database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $uploadDir = $this->getContainer()->getParameter('upload_dir');
        $em = $this->getContainer()->get('doctrine')->getManager();
        $repository = $em->getRepository('SpylBakaBundle:Manga');

        $finder = new Finder();

        foreach ($finder->directories()->in($uploadDir)->depth('== 0') as $directory) {
          $visibility = $directory->getRelativePathname();

          foreach ((new Finder())->directories()->in((string) $directory)->depth('== 0') as $directory) {
              $name = $directory->getRelativePathname();
              $manga = $repository->findOneBy(['name' => $name]);

              if ($manga == null) {
                $manga = new Manga();
                $manga->setName($name);
                $manga->setId($name);
              }

              $previousContents = $manga->getContents();
              $actualContents = (new Finder())->directories()->in((string) $directory)->depth('== 0');

              // remove olds
              foreach ($manga->getContents() as $content) {
                if ($content->getVisibility() == $visibility) {
                    $found = false;
                    foreach ($actualContents as $actual) {
                      if ($content->getName() == $actual->getRelativePathname()) {
                         $found = true;
                      }
                    }
                    if (!$found) {
                       $manga->removeContent($content);
                    }
                }
              }

              // add news
              foreach ($actualContents as $content) {
                    $found = false;
                    foreach ($previousContents as $previous) {
                        if ($content->getRelativePathname() == $previous->getName()) {
                            $found = $content->getRelativePathname();
                        }
                    }
                    if (!$found) {
                      $manga->addContent(
                        (new Content)
                          ->setId($content->getRelativePathname())
                          ->setName($content->getRelativePathname())
                          ->setVisibility($visibility)
                        );
                    }
              }
              $em->persist($manga);
          }
          $em->flush();
        }

        $output->writeln("Database is now sync with your files");
    }
}
