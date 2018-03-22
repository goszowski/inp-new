<?php

namespace App\Http\Controllers;

use Runsite\CMF\Http\Controllers\RunsiteCMFBaseController;
use Illuminate\View\View;

class PagesController extends RunsiteCMFBaseController
{
	/**
	 * Display a listing of the pages.
	 */
	public function index(): View
	{
		$pages = M('page')
			->where('parent_id', $this->node->id) // Only child items of current node
			->ordered() // Order by position asc
			->paginate();

		return $this->view('pages.index', compact('pages'));
	}

	/**
	 * Display the specified page.
	 */
	public function show(): View
	{
		return $this->view('pages.view');
	}
}
