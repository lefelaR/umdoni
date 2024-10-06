<?php

namespace Components;


class TimeMachine 
{
    
    public static function goBackInTime(string $time, string $timezone = null): string
    {
        $time = \DateTime::createFromFormat("", $time);
        return $time;
    }

    public static function goBackToTheFuture(string $time,, string $timezone = null): string
    {
        return "";
    }

    public static function matchTime(string $time,  string $timezone = null): string
    {
        return "";
    }
}