<?php 

namespace Runsite\CMF\Models\Model\Field\FieldTypes;

use Runsite\CMF\Models\Model\Field\Field;
use Runsite\CMF\Models\Dynamic\Language;
use Runsite\CMF\Models\Node\Node;

class IntegerType
{
	public static $name = 'integer';

	public static $displayName = 'integer';

	public static $needField = true;

	public static $size = ['base' => null, 'extra' => null];

	public static $defaultSettings = [
		'control' => [
			'value' => 'default',
			'variants' => [
				'default',
				'readonly',
			],
		],

		'custom_validation_rules' => [
			'value' => 'numeric',
			'variants' => null,
		],
	];

	public static function defaultValue()
	{
		return 0;
	}

	public static function beforeDeleting($old_value, Node $node, Field $field, Language $language)
	{
		return;
	}

	public static function beforeCreating($value, Node $node, Field $field, Language $language)
	{
		return $value;
	}

	public static function beforeUpdating($value, $old_value, Node $node, Field $field, Language $language)
	{
		return $value;
	}
}
