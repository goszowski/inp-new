<?php 

namespace App\Models;

use Runsite\CMF\Models\Dynamic\Dynamic;
use Runsite\CMF\Traits\Constructable;
use File as StorageFile;

class File extends Dynamic
{
	use Constructable;

	public function getFormatAttribute()
	{
		if($this->file_name)
		{
			$exp = explode('.', $this->file_name);
			return end($exp);
		}

		return null;
	}

	public function getSizeAttribute()
	{
		if($this->file_name and file_exists(public_path($this->file_name)))
		{
			return $this->formatBytes(StorageFile::size(public_path($this->file_name)));
		}

		return null;
	}

	private function formatBytes($size, $precision = 2)
	{
		if ($size > 0) {
			$size = (int) $size;
			$base = log($size) / log(1024);
			$suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

			return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
		} else {
			return $size;
		}
	}

	public function canPreview()
	{
		return in_array($this->file_type->node_id, [74, 75]);
	}
}
