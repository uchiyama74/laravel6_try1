<?php

namespace App\Services;

use App\Services\MySrv1Service;

class MySrv2Service
{
    protected $mySrv1Service;

    public function __construct(MySrv1Service $mySrv1Service)
    {
        $this->mySrv1Service = $mySrv1Service;
    }

    public function getDateText($yyyymmdd = null)
    {
        if ($yyyymmdd === null) {
            $unixtime = time(); 
        } else {
            $year = substr($yyyymmdd, 0, 4);
            $month = substr($yyyymmdd, 4, 2);
            $day = substr($yyyymmdd, 6, 2);
            $unixtime = mktime(0, 0, 0, $month, $day, $year);
        }

        return $this->mySrv1Service->getDate($unixtime);
    }
}
