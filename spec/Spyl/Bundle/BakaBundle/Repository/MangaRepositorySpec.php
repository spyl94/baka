<?php

namespace spec\Spyl\Bundle\BakaBundle\Repository;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MangaRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Spyl\Bundle\BakaBundle\Repository\MangaRepository');
    }
}
