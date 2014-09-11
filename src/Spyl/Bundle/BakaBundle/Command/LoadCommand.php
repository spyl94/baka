<?php

namespace Spyl\Bundle\BakaBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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
        $output->writeln("Database is now sync with your files");
    }
}
