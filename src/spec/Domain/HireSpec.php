<?php

namespace spec\SB\EasyHire\Domain;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid;
use SB\EasyHire\Domain\Hire;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SB\EasyHire\Domain\Step;

class HireSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Hire::class);
    }

    public function it_is_fail_on_create_with_no_identifier(): void
    {
        $this->shouldThrow(InvalidArgumentException::class)->duringCreate('', '', '', []);
    }

    public function it_is_fail_on_create_with_no_name(): void
    {
        $identifier = Uuid::uuid4();
        $this->shouldThrow(InvalidArgumentException::class)->duringCreate($identifier, '', '', []);
    }

    public function it_is_fail_on_create_with_no_description(): void
    {
        $identifier = Uuid::uuid4();
        $this->shouldThrow(InvalidArgumentException::class)->duringCreate($identifier, 'Hire', '', []);
    }



    public function it_is_fail_on_create_with_no_steps(): void
    {
        $identifier = Uuid::uuid4();
        $this->shouldThrow(InvalidArgumentException::class)->duringCreate($identifier, 'Hire', 'Simple Hire Pipeline', []);
    }

    public function it_should_create(): void
    {
        $step1 = new class implements Step {};
        $step2 = new class implements Step {};

        $identifier = '9056ba0b-6400-46d1-ac3f-7bbc49f32fff';

        $this->beConstructedThrough(
            'create',
            [
                $identifier,
                'Hire',
                'Simple Hire Pipeline',
                [
                    $step1,
                    $step2,
                ],
            ]
        );

        $this->getIdentifier()->shouldBeEqualTo($identifier);
        $this->getName()->shouldBeEqualTo('Hire');
        $this->getDescription()->shouldBeEqualTo('Simple Hire Pipeline');
    }
}
