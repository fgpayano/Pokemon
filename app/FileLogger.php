<?php

namespace App;

use App\Contracts\Logger;

class FileLogger implements Logger
{
	private $name = "info";
	const FILE_LOCATION = "app/";
	const FILE_EXTENSION = ".log";

	public function info($message)
	{
		file_put_contents(
			$this->getFileLocation(),
			$this->getMessageWithTime($message),
			FILE_APPEND
		);
	}

	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	public function getFileLocation()
	{
		return static::FILE_LOCATION . $this->name . static::FILE_EXTENSION;
	}

	public function getMessageWithTime($message)
	{
		return get_date_time()." - {$message}\n";
	}
}