<?php

namespace App\Http\Controllers;

use Runsite\CMF\Http\Controllers\RunsiteCMFBaseController;
use Illuminate\View\View;

class RootsController extends RunsiteCMFBaseController
{
	/**
	 * Display a listing of the roots.
	 */
	public function index(): View
	{
		$roots = M('root')
			->where('parent_id', $this->node->id) // Only child items of current node
			->ordered() // Order by position asc
			->paginate();

		return $this->view('roots.index', compact('roots'));
	}

	/**
	 * Display the specified root.
	 */
	public function show(): View
	{
		return $this->view('roots.view');
	}
}
