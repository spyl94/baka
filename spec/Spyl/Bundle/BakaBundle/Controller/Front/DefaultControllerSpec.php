<?php

namespace spec\Spyl\Bundle\BakaBundle\Controller\Front;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DefaultControllerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Spyl\Bundle\BakaBundle\Controller\Front\DefaultController');
    }
}
