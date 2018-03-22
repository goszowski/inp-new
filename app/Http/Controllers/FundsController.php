<?php

namespace App\Http\Controllers;

use Runsite\CMF\Http\Controllers\RunsiteCMFBaseController;
use Illuminate\View\View;

class FundsController extends RunsiteCMFBaseController
{
	/**
	 * Display the specified page.
	 */
	public function show(): View
	{
		$descriptions = M('description')->where('rs_nodes.parent_id', $this->fields->node->id)->ordered()->paginate();
		return $this->view('funds.show', compact('descriptions'));
	}
}
