<?php

namespace App\Utils;

interface MarsTimeCalculatorInterface
{

    //announced till 2020
    const LEAPS_SECOND = 37;
    //January 1, 1970 GMT
    const ZERO_POINT = 2440587.5;
    const SECONDS_1_DAY = 86400;
    const TAI_OFFSET_SEC = 32.184;
    const JAN_2000 = 2451545.0;
    //The length of a Martian day and Earth (Julian) day differ by a ratio of 1.027491252 
    const DIFF_RATIO = 1.027491252;
    // to keep the MSD positive going back to midday December 29th 1873, we add 44,796.
    const BACK_TO_MIDDAY = 44796.0;
    const ADJUSMNET = 0.00096;
    const PRECISION = 5;
    public function getTimes(\DateTime $dateTime): array;
}
