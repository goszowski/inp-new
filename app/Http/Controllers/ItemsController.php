<?php

namespace App\Http\Controllers;

use Runsite\CMF\Http\Controllers\RunsiteCMFBaseController;
use Illuminate\View\View;

class ItemsController extends RunsiteCMFBaseController
{
	/**
	 * Display the specified page.
	 */
	public function show(): View
	{
		$files = M('file')->where('rs_nodes.parent_id', $this->fields->node->id)->ordered()->get();
		$description = M('description')->where('rs_nodes.id', $this->fields->node->parent_id)->first();
		$fund = M('fund')->where('rs_nodes.id', $description->node->parent_id)->first();

		return $this->view('items.show', compact('files', 'description', 'fund'));
	}
}
