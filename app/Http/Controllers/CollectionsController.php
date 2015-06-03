<?php namespace Met\Http\Controllers;

class CollectionsController extends Controller {

	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index()
	{
		return view('collections/index');
	}

	public function create()
	{
		return view('collections/create');
	}

}
