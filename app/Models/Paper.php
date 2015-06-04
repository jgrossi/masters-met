<?php namespace Met\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class Paper extends Model {

	protected $table = 'papers';

    public function delete()
    {
        $path = Config::get('filesystems.disks.extraction_pdf.root');
        $file_path = $path.'/'.$this->file_path;

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        return parent::delete();
    }

}
