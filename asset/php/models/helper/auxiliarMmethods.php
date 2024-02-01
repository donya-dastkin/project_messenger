<?php

trait globalFonc
{
    public function sendTime()
    {
        date_default_timezone_set("Asia/Tehran");
        $time = time();
        return $time;
    }
}

?>