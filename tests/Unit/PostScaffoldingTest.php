<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use function Safe\file_get_contents;

class PostScaffoldingTest extends TestCase
{
    public function testItemQuery()
    {
        $itemQuery = file_get_contents(base_path() . '/resources/js/components/Post/queryItem.graphql');
        $itemQuery = preg_replace('/\s+/', ' ', $itemQuery);
        $this->assertStringNotContainsString('password', $itemQuery);
        $this->assertStringNotContainsString('email_verified_at', $itemQuery);
        $this->assertStringContainsString('title', $itemQuery);
        $this->assertStringContainsString('content', $itemQuery);
        $this->assertStringContainsString('can', $itemQuery);
        $this->assertStringContainsString('user { id name', $itemQuery);
        $this->assertStringContainsString('section { id title }', $itemQuery);
        $this->assertStringContainsString('comments { id content }', $itemQuery);
    }
}
