<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tranx extends Model {

	protected $table = 'book_tranx';
	
	protected $fillable = [
		'book_id',
		'user_id',
		'borrow_dt',
		'due_dt'
	];
	
	public function Book()
	{
		return $this->belongsTo('App\Book', 'book_id', 'book_id');
	}
	
	public function BookAudit()
	{
		return $this->belongsTo('App\BookAudit', 'book_id', 'book_id');
	}
	
	public function User()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}

}
