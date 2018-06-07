<?php

namespace Runsite\CMF\Models\Node;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Runsite\CMF\Models\Model\Field\Field;
use Runsite\CMF\Models\Dynamic\Language;
use Runsite\CMF\Models\User\User;

class History extends Eloquent
{
	protected $table = 'rs_nodes_history';
	protected $fillable = ['node_id', 'field_id', 'language_id', 'value', 'user_id'];

	public function node()
	{
		return $this->belongsTo(Node::class, 'node_id');
	}

	public function field()
	{
		return $this->belongsTo(Field::class, 'field_id');
	}

	public function language()
	{
		return $this->belongsTo(Language::class, 'language_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
