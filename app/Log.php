<?php

namespace App;

use App\Contracts\Logger;

class Log 
{
    private static $logger;
	
	public static function setLogger(Logger $logger)
	{
		static::$logger = $logger;
	}
	
	public static function info($message)
	{
		static::$logger->info($message);
	}	
}