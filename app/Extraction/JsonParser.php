<?php

namespace Met\Extraction;

use Met\Models\Collection;
use Met\Models\Author;
use Met\Models\Paper;
use Met\Models\Reference;
use Config;

class JsonParser
{
    protected $content;

    protected $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;

        $this->setFileContent();
    }

    public function setFileContent()
    {
        $path = Config::get('filesystems.disks.extraction_json.root');
        $file_name = $this->collection->file->file_path;
        $file_path = $path.'/'.$file_name;

        $this->content = file_get_contents($file_path);
    }

    public function run()
    {
        $json = json_decode($this->content);

        foreach ($json->papers as $p) {

            $paper = Paper::where('original_filename', $p->filename)
                ->where('collection_id', $this->collection->id)->first();

            $paper->area_id = $p->area;
            $paper->title = $p->title;

            foreach ($p->authors as $a) {
                $author = new Author;
                $author->name = $a->name;
                $author->email = $a->email;
                $author->paper_id = $paper->id;
                $author->save();
            }

            $paper->abstract = $p->abstract;
            $paper->status = 'collected';

            foreach ($p->references as $r) {
                $reference = new Reference;
                $reference->title = $r->title;
                $reference->authors = serialize($r->authors);
                $reference->paper_id = $paper->id;
                $reference->save();
            }

            $paper->save();

            $this->collection->status = 'collected';
            $this->collection->save();
        }
    }

}