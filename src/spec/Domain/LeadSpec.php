<?php

namespace spec\SB\EasyHire\Domain;

use InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Ramsey\Uuid\Uuid;
use SB\EasyHire\Domain\Lead;

class LeadSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Lead::class);
    }

    public function it_is_fail_on_create_with_no_identifier(): void
    {
        $this->shouldThrow(InvalidArgumentException::class)->duringCreate('', '', '');
    }

    public function it_is_fail_on_create_with_no_first_name(): void
    {
        $identifier = Uuid::uuid4();
        $this->shouldThrow(InvalidArgumentException::class)->duringCreate($identifier, '', '');
    }

    public function it_is_fail_on_create_with_no_last_name(): void
    {
        $identifier = Uuid::uuid4();
        $this->shouldThrow(InvalidArgumentException::class)->duringCreate($identifier, 'First', '');
    }

    public function it_should_create(): void
    {
        $identifier = '9056ba0b-6400-46d1-ac3f-7bbc49f32fef';
        $this->beConstructedThrough('create', [$identifier, 'First', 'Last']);
        $this->getIdentifier()->shouldBeEqualTo($identifier);
        $this->getFirstName()->shouldBeEqualTo('First');
        $this->getLastName()->shouldBeEqualTo('Last');
    }
}
