<?php

namespace spec\Spyl\Bundle\BakaBundle\Reader;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PageReaderSpec extends ObjectBehavior
{

	function let($uploadDir)
	{
	    $this->beConstructedWith($encoderFactory);
	}


    function it_is_initializable()
    {
        $this->shouldHaveType('Spyl\Bundle\BakaBundle\Reader\PageReader');
    }

    function it_lists_a_manga_content_pages()
    {
    	$this->listPages();
    }
}
