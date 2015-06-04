<?php namespace Met\Http\Controllers;

use Request;
use Storage;
use Session;
use Met\Http\Requests;
use Met\Http\Controllers\Controller;
use Met\Models\CollectionFile;
use Met\Models\Collection;
use Met\Http\Requests\CreateCollectionRequest;

class CollectionsController extends Controller {

	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index()
	{
		$collections = Collection::latest()->get();

		return view('collections.index', compact('collections'));
	}

	public function create()
	{
		return view('collections.create');
	}

	public function store()
	{
		return redirect()->route('collections.index');
	}

    public function destroy($id)
    {
        Collection::find($id)->delete();

        return redirect()->route('collections.index');
    }

	public function dataUpload(CreateCollectionRequest $request)
	{
		if (Request::hasFile('file')) {

            $filename = uniqid().'.json';
            $file_path = date('Y/m/').$filename;
            $file = Request::file('file');
            $file_content = \File::get($file->getRealPath());

            if ($file->isValid()) {

                $collection = new Collection($request->all());
                $collection->status = 'new';
                $collection->save();
                $collection_id = $collection->id;

                Session::put('upload.collection_id', $collection_id);
                Storage::disk('extraction_json')->put($file_path, $file_content);

                $json_file = new CollectionFile;
                $json_file->file_path = $file_path;
                $json_file->collection_id = $collection_id;
                $json_file->save();
            }
        }
	}

}
