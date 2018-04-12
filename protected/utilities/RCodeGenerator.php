<?php
class RCodeGenerator
{
    
    public static function getResearchCode()
    {
        $prefix = "RC";
        $year =  date("Ymd");
        $running = sprintf('%05d',  Tracking::getMax());
        return $prefix.$year.$running;
    }
    
}

