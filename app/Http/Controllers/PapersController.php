<?php namespace Met\Http\Controllers;

use Met\Models\Paper;
use Met\Http\Requests;
use Met\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;

class PapersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function upload()
    {
        $collection_id = \Session::get('upload.collection_id');

        if (\Request::hasFile('file')) {

            /**
             * @var $file UploadedFile
             */
            $file = \Request::file('file');

            $filename = uniqid().'.pdf';
            $file_path = date('Y/m/').$filename;
            $file_content = \File::get($file->getRealPath());

            \Storage::disk('extraction_pdf')->put($file_path, $file_content);

            $paper = new Paper;
            $paper->collection_id = $collection_id;
            $paper->file_path = $file_path;
            $paper->original_filename = $file->getClientOriginalName();
            $paper->save();
        }
    }

}
