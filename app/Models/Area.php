<?php namespace Met\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model {

	protected $table = 'areas';

    protected $fillable = ['name', 'slug'];

}
