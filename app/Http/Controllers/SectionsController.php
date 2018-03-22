<?php

namespace App\Http\Controllers;

use Runsite\CMF\Http\Controllers\RunsiteCMFBaseController;
use Illuminate\View\View;

class SectionsController extends RunsiteCMFBaseController
{
	/**
	 * Display a listing of the sections.
	 */
	public function index(): View
	{
		$sections = M('section')
			->where('parent_id', $this->node->id) // Only child items of current node
			->ordered() // Order by position asc
			->paginate();

		return $this->view('sections.index', compact('sections'));
	}

	/**
	 * Display the specified section.
	 */
	public function show(): View
	{
		return $this->view('sections.view');
	}
}
