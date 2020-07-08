<?php

namespace App\Tests\Utils;

use App\Utils\MarsTimeCalculator;
use PHPUnit\Framework\TestCase;

class MarsTimeCalculatorTest extends TestCase
{
    /**
     * test getTime with 2020-07-07 23:05:02 GMT date, should return msd 52084.5892
     * and 14:08:26 +00:00
     * I grab an example from https://jtauber.github.io/mars-clock/
     */
    public function testGetTimeWithGMTDate()
    {
        $marsTimeCalculator = new MarsTimeCalculator();
        $dateTime = new \DateTime('2020-07-07 23:05:02 GMT');
        list($msd,$mtc) = $marsTimeCalculator->getTimes($dateTime);
        $this->assertEquals(52084.5892, $msd);
        $this->assertEquals('14:08:26 GMT', $mtc);
    }
    
    /**
     * test getTime with 2020-07-07 21:05:02 +02:00 date, should return msd 52084.5892
     * and 14:08:26 +00:00
     * I grab an example from https://jtauber.github.io/mars-clock/
     */
    public function testGetTimeWithUTCDate()
    {
        $marsTimeCalculator = new MarsTimeCalculator();
        //Europe time
        $dateTime = new \DateTime('2020-07-08 01:05:02');
        $timeZone = new \DateTimeZone('Europe/Amsterdam');
        $dateTime->setTimezone($timeZone);
        list($msd,$mtc) = $marsTimeCalculator->getTimes($dateTime);
        $this->assertEquals(52084.5892, $msd);
        $this->assertEquals('14:08:26 GMT', $mtc);
    }
}
