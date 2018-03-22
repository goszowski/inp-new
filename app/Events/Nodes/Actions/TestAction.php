<?php 

namespace App\Events\Nodes\Actions;

use Runsite\CMF\Models\Node\Node;
use Runsite\CMF\Contracts\NodeAction;
use Runsite\CMF\Models\User\User;

class TestAction implements NodeAction 
{
	public function handle(Node $node)
	{
		foreach(User::get() as $user)
		{
			$user->notify($node, 'Новий тойсамий шось там зробилося в ноді '.$node->fields->name, 'user');
		}
	}
}
