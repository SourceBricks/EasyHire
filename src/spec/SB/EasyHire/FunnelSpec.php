<?php

namespace spec\SB\EasyHire;

use SB\EasyHire\Funnel;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FunnelSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Funnel::class);
    }

    function it_is_should_validate_invalid_mail_input()
    {
        $this->shouldThrow(\InvalidArgumentException::class)->duringCreateLead('First', 'Last', 'mail@mail');
    }
}
