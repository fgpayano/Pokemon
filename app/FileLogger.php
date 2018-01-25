<?php

namespace App;

use App\Contracts\Logger;

class FileLogger implements Logger
{
	const DEFAULT_DIRECTORY_PATH = "app/";
	
	public function info($message)
	{
		file_put_contents(static::DEFAULT_DIRECTORY_PATH."info.log", getDateTime()." - {$message}\n", FILE_APPEND);
	}
}