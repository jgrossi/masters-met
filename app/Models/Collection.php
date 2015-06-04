<?php namespace Met\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model {

	protected $table = 'collections';

	protected $fillable = ['name'];

	public function papers()
	{
		return $this->hasMany('Met\Models\Paper', 'collection_id');
	}

    public function file()
    {
        return $this->hasOne('Met\Models\CollectionFile', 'collection_id');
    }

    public function delete()
    {
        $this->file()->first()->delete();

        $papers = $this->papers()->get();

        foreach ($papers as $paper) {
            $paper->delete();
        }

        return parent::delete();
    }


}
