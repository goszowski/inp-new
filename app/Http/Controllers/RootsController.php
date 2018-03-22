<?php

namespace App\Http\Controllers;

use Runsite\CMF\Http\Controllers\RunsiteCMFBaseController;
use Illuminate\View\View;

class RootsController extends RunsiteCMFBaseController
{
	/**
	 * Display the specified root.
	 */
	public function show(): View
	{
		$funds = M('fund')->ordered()->paginate();

		return $this->view('roots.view', compact('funds'));
	}
}
