<?php namespace Met\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class CollectionFile extends Model {

    protected $table = 'collections_files';

    protected $path = '';

    public function __construct()
    {
        $this->path = Config::get('filesystems.disks.extraction_json.root');
    }

    public function delete()
    {
        $file_path = $this->path.'/'.$this->file_path;

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        return parent::delete();
    }

    public function getFullPath()
    {
        return $this->path.'/'.$this->file_path;
    }

}
