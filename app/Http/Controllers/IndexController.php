<?php namespace Met\Http\Controllers;

class IndexController extends Controller {

	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index()
	{
		return view('extractions/index');
	}

}
