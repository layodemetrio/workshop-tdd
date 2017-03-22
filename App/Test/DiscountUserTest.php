<?php

namespace App\Test;

use App\Model\DiscountUser;
use PHPUnit_Framework_TestCase;

class DiscountUserTest extends PHPUnit_Framework_TestCase
{
    /**
    * @test
    * @dataProvider providerValues
    */
    public function verifyDiscountUser($expected, $value)
    {
        $this->assertEquals(
            $expected,
            (new DiscountUser())->get($value)
        );
    }

    public function providerValues()
    {
        return array(
            [50, 100],
            [450, 500],
            [950, 1000]
        );
    }
}
