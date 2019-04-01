<?php
declare(strict_types=1);

namespace SB\EasyHire\Domain;

use Assert\Assertion;

final class AppliedByHimself implements Referral
{
    private $referral;

    /**
     * AppliedByHimself constructor.
     *
     * @param $referral
     */
    public function __construct()
    {
        $this->referral = 'applied-by-himself';
    }

    public function __toString(): string
    {
        return $this->referral;
    }
}
