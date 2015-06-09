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
//        $exec = new \Met\Extraction\Tools\CermineExtraction();
//        $exec->execute(Collection::find(1));
//
//        $title = $exec->getTitle();
//        $correct_title = "Automatic Extraction of Table Metadata from Digital Documents";//$exec->getTitle();
//
//        $comparison = new \Met\Extraction\Comparisons\TitleComparison($correct_title, $title);
//        $comparison->calculate();
//
//        dd($comparison->getResult().'%');

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