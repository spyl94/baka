<?php

namespace Spyl\Bundle\BakaBundle\Behat;

use Behat\Gherkin\Node\TableNode;
use Symfony\Component\EventDispatcher\GenericEvent;
use GuzzleHttp\Client;

class MangaContext extends DefaultContext
{
    public $response;
    public $client;
    
    public function __construct()
    {
        parent::__construct();
        $baseUrl = 'http://baka.dev/app_test/';
        $client = new Client(['base_url' => $baseUrl]);
        $this->client = $client;
    }

    /**
      * @When /^I request "([^"]*)"$/
      */
    public function iRequest($uri)
    {
        $request = $this->client->get($uri);
        $this->response = $request;
    }


    /**
     * @Then /^the response status code should be (\d+)$/
     */
    public function theResponseStatusCodeShouldBe($httpStatus)
    {
        if ((string)$this->response->getStatusCode() !== $httpStatus) {
            throw new \Exception(
                'HTTP code does not match '
                .$httpStatus.
                ' (actual: '.$this->response->getStatusCode().')'
            );
        }
    }

    /**
     * @Then /^the response should be JSON$/
     */
    public function theResponseShouldBeJson()
    {
        $data = json_decode($this->response->getBody(true));
        if (empty($data)) { 
            throw new Exception("Response was not JSON\n" . $this->response);
       }
    }

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