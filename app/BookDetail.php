<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model {

	protected $table = 'book_details';
	
	protected $fillable = [
		'book_id',
		'publication',
		'excerpt',
		'category'
	];
	
	public function Book()
	{
		return $this->BelongsTo('App\Book', 'book_id', 'book_id');
	}


}
