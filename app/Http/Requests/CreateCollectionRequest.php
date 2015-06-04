<?php namespace Met\Http\Requests;

use Met\Http\Requests\Request;

class CreateCollectionRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	public function messages()
	{
	    return [
	        'name.required' => 'The new collection must have a name',
	        'name.min' => 'The given collection name must have at least :min characters',
	    ];
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|min:5',
		];
	}

}
