<?php

namespace spec\Spyl\Bundle\BakaBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MangaSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Spyl\Bundle\BakaBundle\Model\Manga');
    }

    function it_implements_manga_interface()
    {
        $this->shouldImplement('Spyl\Bundle\BakaBundle\Model\MangaInterface');
    }
}
