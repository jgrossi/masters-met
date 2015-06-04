<?php namespace Met\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model {

	protected $table = 'collections';

	protected $fillable = ['name'];

	public function papers()
	{
		return $this->hasMany('Met\Models\Paper', 'collection_id');
	}

}
