<?php

namespace App\Http\Controllers;

use Runsite\CMF\Http\Controllers\RunsiteCMFBaseController;
use Illuminate\View\View;

class DescriptionsController extends RunsiteCMFBaseController
{
	/**
	 * Display the specified page.
	 */
	public function show(): View
	{
		$items = M('item')->where('rs_nodes.parent_id', $this->fields->node->id)->ordered()->paginate();
		return $this->view('descriptions.show', compact('items'));
	}
}
