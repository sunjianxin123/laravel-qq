<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        dd(date('Y-m-d H:00:00',strtotime('-2 hour')));
        echo mktime(13);die;

        dd(config_path('generator.php'));

        $this->assertTrue(true);
    }
}
