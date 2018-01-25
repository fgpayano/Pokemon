<?php

namespace App;

use App\Contracts\Logger;

class HtmlLogger implements Logger
{
	public function info($message)
	{
		echo "<p>{$message}</p>";
	}
}