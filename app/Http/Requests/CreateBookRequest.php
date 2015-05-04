<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateBookRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		if(\Auth::user()->type == 'manager')
			return true;
		else
			return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' =>'required|max:255',
			'author' =>'required|max:255',
			'total' =>'required|integer'
		];
	}

}
