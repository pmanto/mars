<?php

namespace App\Utils;

class MarsTimeCalculator implements MarsTimeCalculatorInterface
{

    /**
     * get mars sol date given a regular date
     * @param \DateTime $dateTime               datetime
     * @return float                            mars sol date
     */
    private function getMarsSolDate(\DateTime $dateTime): float
    {
        //unix time plus leap seconds
        $unixTime = $dateTime->getTimestamp();
        //convert to julian date
        $jdUt = $unixTime / self::SECONDS_1_DAY + self::ZERO_POINT;
        //Convert julian date to Julian Date Terrestial time (counting leaps)
        $jdTT = $jdUt + (self::LEAPS_SECOND + self::TAI_OFFSET_SEC) / self::SECONDS_1_DAY;
        $j2000 = $jdTT - self::JAN_2000;
        //starting point for mars date  6th January 2000 00:00
        $startingDate = $j2000 - 4.5;
        $msd = ($startingDate / self::DIFF_RATIO) + self::BACK_TO_MIDDAY - self::ADJUSMNET;
        return round($msd, self::PRECISION);
    }

    /**
     * get martian coordinated time
     * @param float $msd                        mars sol date                    
     * @return string                           mtc               
     */
    private function getMartianCoordinatedTime(float $msd): string
    {
        //(msd x 24h)
        $mtc = ($msd * self::SECONDS_1_DAY);
        return gmdate('H:i:s', $mtc).' GMT';
    }

    /**
     * Get times
     * @param \DateTime $dateTime               datetime object
     * @return array                            msd and mtc
     */
    public function getTimes(\DateTime $dateTime): array
    {
        $msd = $this->getMarsSolDate($dateTime);
        $mtc = $this->getMartianCoordinatedTime($msd);
        return [$msd, $mtc];
    }

}
