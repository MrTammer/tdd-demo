<?php

namespace Tests\Unit\Cars\Models;

use App\Cars\Exceptions\EngineException;
use App\Cars\Models\Car;
use App\Cars\Models\Engine;
use Tests\TestCase;


class CarTest extends TestCase
{
    /** @test */
    public function can_set_engine()
    {
        //set up
        $engine = new Engine;
        $car = new Car;

        $this->assertAttributeEquals(null, 'engine', $car);

        //execution
        $car->setEngine($engine);

        // validation
        $this->assertAttributeEquals($engine, 'engine', $car);
    }

    /** @test */
    public function cant_start_without_engine()
    {
        //setup
        $car = new Car;
        $car->setEngine(null);

        // a bit special here, we declare what we expect, but it will be tested at then end of the test method
        $this->expectException(EngineException::class);

        // execution
        $car->start();
    }

    /** @test */
    public function starting_turns_engine_on()
    {
        //setup
        $car = new Car;
        $car->setEngine(new Engine);
        $this->assertFalse($car->getEngine()->isOn());

        //execution
        $car->start();

        //validation
        $this->assertTrue($car->getEngine()->isOn());
    }
}