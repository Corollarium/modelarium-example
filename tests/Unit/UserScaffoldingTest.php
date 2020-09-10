<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use function Safe\file_get_contents;

class UserScaffoldingTest extends TestCase
{
    public function testItemQuery()
    {
        $itemQuery = file_get_contents(base_path() . '/resources/js/components/User/queryItem.graphql');
        $this->assertStringNotContainsString('password', $itemQuery);
        $this->assertStringNotContainsString('email_verified_at', $itemQuery);
        $this->assertStringNotContainsString('comments', $itemQuery);
        $this->assertStringContainsString('name', $itemQuery);
    }
}
