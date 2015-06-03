<?php namespace Met\Http\Controllers;

use Met\Http\Requests;
use Met\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ExtractionsController extends Controller {

	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index()
	{
		return view('extractions.index');
	}

	public function create()
	{
		return view('extractions.create');
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		return view('extractions.show', compact('id'));
	}

	public function last()
	{
		$last_id = 155;
		
		return redirect()->route('extractions.show', [$last_id]);
	}

	public function results($id, $tool)
	{
		return view('extractions.results', compact('id', 'tool'));
	}

}