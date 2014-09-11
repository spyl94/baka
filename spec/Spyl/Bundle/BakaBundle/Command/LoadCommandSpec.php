<?php

namespace spec\Spyl\Bundle\BakaBundle\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LoadCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Spyl\Bundle\BakaBundle\Command\LoadCommand');
    }
}
