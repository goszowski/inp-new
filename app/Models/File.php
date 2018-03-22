<?php 

namespace App\Models;

use Runsite\CMF\Models\Dynamic\Dynamic;
use Runsite\CMF\Traits\Constructable;

class File extends Dynamic
{
	use Constructable;

	public function getFormatAttribute()
	{
		return 'Format';
	}

	public function getSizeAttribute()
	{
		return 'Size';
	}
}
