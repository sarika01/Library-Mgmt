<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BookAudit extends Model {

	protected $table = 'book_audit';
	
	protected $fillable = [
		'book_id',
		'total'
	];

	public function Book()
	{
		return $this->BelongsTo('App\Book', 'book_id', 'book_id');
	}
	
	public function Tranx()
	{
		return $this->hasMany('App\Tranx', 'book_id', 'book_id');
	}
}
