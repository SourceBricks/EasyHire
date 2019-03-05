<?php
declare(strict_types=1);

namespace SB\EasyHire;

use Assert\Assertion;

class Funnel implements FunnelInterface
{
    public function createLead(string $firstName, string $lastName, string $email)
    {
        Assertion::email($email, 'create.lead.invalid.email');
    }
}
