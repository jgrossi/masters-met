<?php namespace Met\Http\Controllers;

use Met\Http\Requests;
use Met\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Met\Models\Collection;
use Met\Models\Tool;

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
        $collections = Collection::latest()->get();

		return view('extractions.create', compact('collections'));
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
        $tools = Tool::all();

		return view('extractions.show', compact('id', 'tools'));
	}

	public function last()
	{
		$last_id = 155;
		
		return redirect()->route('extractions.show', [$last_id]);
	}

	public function results($id, $tool_slug)
	{
        $tool = Tool::where('slug', $tool_slug)->first();

		return view('extractions.results', compact('id', 'tool'));
	}

}