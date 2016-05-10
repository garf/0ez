<?php


class SiteTest extends TestCase
{
    public function test_index_page_is_accessible()
    {
        $this->call('GET', '/');
        $this->assertResponseOk();
    }
}
