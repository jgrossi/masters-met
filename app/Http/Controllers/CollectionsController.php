<?php namespace Met\Http\Controllers;

use Request;
use Storage;
use Session;
use File;
use Met\Http\Requests;
use Met\Http\Controllers\Controller;
use Met\Models\CollectionFile;
use Met\Models\Collection;
use Met\Http\Requests\CreateCollectionRequest;
use Met\Extraction\JsonParser;

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
        $collection_id = Session::get('upload.collection_id');
        $collection = Collection::find($collection_id);

        // TODO Put inside Queue
        $parser = new JsonParser($collection);
        $parser->run();

        if ($collection) {
            Session::flash('alert', ['success' => "Collection '{$collection->name}' created and uploaded successfully!"]);
        } else {
            Session::flash('alert', ['danger' => "Cannot create the new Collection."]);
        }

		return redirect()->route('collections.index');
	}

    public function destroy($id)
    {
        $collection = Collection::find($id);

        if (!$collection) {
            Session::flash('alert', ['danger' => "The Collection '$id' does not exist."]);
        }

        $collection->delete();
        Session::flash('alert', ['success' => "Collection '{$collection->name}' deleted successfully!"]);

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

                if (empty($collection->name)) {
                    $collection->name = $filename;
                }

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

    public function papers($id)
    {
        $collection = Collection::find($id);
        $file = $collection->file()->first();
        $path = $file->getFullPath();

        $file_content = File::get($path);

        return view('collections.papers', compact('file_content', 'collection'));
    }

}
