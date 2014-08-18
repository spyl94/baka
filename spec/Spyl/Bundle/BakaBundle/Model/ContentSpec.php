<?php

namespace spec\Spyl\Bundle\BakaBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MangaContentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Spyl\Bundle\BakaBundle\Model\Content');
    }
}
