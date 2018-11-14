<?php

namespace Tests\Unit\Cars\Models;

use App\Cars\Models\Engine;
use Tests\TestCase;

class EngineTest extends TestCase
{
    /** @test */
    public function cant_be_turned_on()
    {
        // set up
        $engine = new Engine;
        $this->assertFalse($engine->isOn());

        // execution
        $engine->turnOn();

        //validation
        $this->assertTrue($engine->isOn());
    }
}