<?php

namespace SB\EasyHire;

interface FunnelInterface
{
    public function createLead(string $firstName, string $lastName, string $email);
}
