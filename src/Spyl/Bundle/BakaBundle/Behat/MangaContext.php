<?php

namespace Spyl\Bundle\BakaBundle\Behat;

use Behat\Gherkin\Node\TableNode;
use Doctrine\Common\DataFixtures\Loader;

class MangaContext extends WebApiContext
{

    /**
     * @Given /^the database is empty$/
     */
    public function theDatabaseIsEmpty()
    {
        $this->purgeDatabase();
    }

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
     * @Given /^there are the following manga pages in "([^"]*)":$/
     */
    public function thereAreMangasPages($folder, TableNode $table)
    {
        $dir = $this->getParameter('upload_dir');

        foreach ($table->getHash() as $data) {
            $contentDir = $dir . '/' . $folder . '/' . $data['manga'] . '/' . $data['content'];
            if (!is_dir($contentDir)) {
                mkdir($contentDir, 0777, true);
            }
            $ch = curl_init('http://lorempixel.com/400/200/');
            $fp = fopen($contentDir . '/' . $data['page'], "wb");
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);
        }
    }

    /**
     * @Then /^the following manga contents are persisted:$/
     */
    public function thereAreMangasContentsPersisted(TableNode $table)
    {
        $em = $this->getService('doctrine')->getManager();
        $repository = $em->getRepository('SpylBakaBundle:Manga');

        foreach ($table->getHash() as $data) {
            $manga = $repository->findOneBy(['name' => $data['manga']]);
            \PHPUnit_Framework_Assert::assertNotNull($manga);

            $found = false;
            foreach ($manga->getContents() as $content) {
                if ($content->getName() == $data['content']) {
                    $found = true;
                }
            }
            \PHPUnit_Framework_Assert::assertTrue($found);
        }
    }
}
