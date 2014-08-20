<?php

namespace spec\Spyl\Bundle\BakaBundle\Controller\Api;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpFoundation\Request;

class MangaControllerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Spyl\Bundle\BakaBundle\Controller\Api\MangaController');
    }

    function it_is_a_rest_controller()
    {
    	$this->shouldHaveType('FOS\RestBundle\Controller\FOSRestController');
    }

    function it_lists_mangas()
    {
    	$request = new Request();
    	$response = $this->cgetMangasAction($request);
    }
}
