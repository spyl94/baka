<?php

namespace Spyl\Bundle\BakaBundle\Behat;

use Behat\Gherkin\Node\TableNode;
use Doctrine\Common\DataFixtures\Loader;

class MangaContext extends WebApiContext
{
    /**
     * @Given /^there are mangas with content fixtures$/
     */
    public function thereAreMangasWithContentFixtures()
    {
        $loader = new Loader();
        $this->loadFixtureClass($loader, 'Spyl\Bundle\BakaBundle\DataFixtures\ORM\LoadMangaContentData');
        $this->purgeAndExecuteFixtures($loader);
    }

    /**
     * @Given /^there are the following manga pages:$/
     */
    public function thereAreMangasPages(TableNode $table)
    {
        $dir = $this->getParameter('upload_dir');

        foreach ($table->getHash() as $data) {
            $contentDir = $dir . '/' . $data['manga'] . '/' . $data['content'];
            if (!is_dir($contentDir)) {
                mkdir($contentDir, 0777, true);                
            }
            fopen($contentDir . '/' . $data['page'], "w");
        }
    }
}