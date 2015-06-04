<?php namespace Met\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class CollectionFile extends Model {

    protected $table = 'collections_files';

    public function delete()
    {
        $path = Config::get('filesystems.disks.extraction_json.root');
        $file_path = $path.'/'.$this->file_path;

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        return parent::delete();
    }

}
