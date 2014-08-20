<?php

namespace spec\Spyl\Bundle\BakaBundle\Reader;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PageReaderSpec extends ObjectBehavior
{

    /**
     * @param \Symfony\Component\Routing\RouterInterface $router
     */
	function let($router)
	{
	    $this->beConstructedWith('', '', $router);
	}


    function it_is_initializable()
    {
        $this->shouldHaveType('Spyl\Bundle\BakaBundle\Reader\PageReader');
    }

    function it_lists_a_manga_content_pages()
    {
    	//$this->listPages();
    }
}
