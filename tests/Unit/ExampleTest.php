<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\URL;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        echo env('YUN_AppID');die;


        echo bcrypt(123456);
        $this->assertTrue(true);
    }

    public function testL()
    {
        echo strtotime("-1 week");die;
        echo URL::asset('/vue/js/element/css/element.css');die;
       $str = '<';
       $de =  htmlentities($str);
       echo html_entity_decode($de);
    }
}
