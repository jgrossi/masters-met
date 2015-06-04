<?php namespace Met\Models;

use Illuminate\Database\Eloquent\Model;

class Extraction extends Model {

	protected $table = 'extractions';

	protected $dates = ['extracted_at']; // \Carbon\Carbon

}
