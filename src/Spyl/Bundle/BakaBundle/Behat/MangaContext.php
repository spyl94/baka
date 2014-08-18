<?php

namespace Spyl\Bundle\BakaBundle\Behat;

use Behat\Gherkin\Node\TableNode;

class MangaContext extends WebApiContext
{
    /**
     * @Given /^there are following mangas:$/
     * @Given /^the following mangas exist:$/
     */
    public function thereAreMangas(TableNode $table)
    {
        $manager = $this->getEntityManager();
        //$repository = $manager->getRepository('SpylBakaBundle:Manga');

        foreach ($table->getHash() as $data) {
            //$manager->persist($data);
        }

        $manager->flush();
    }
}