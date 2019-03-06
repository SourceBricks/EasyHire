<?php
declare(strict_types=1);

namespace Tests\Unit;

use \PHPUnit\Framework\TestCase;

class FirstTest extends TestCase {
    public function testTrue()
    {
        $this->assertSame(1, 1);
    }
}
