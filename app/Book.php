<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

	protected $table = 'books';
	
	protected $fillable = [
		'title',
		'author'
	];
	
	public function BookDetail()
	{
		return $this->hasOne('App\BookDetail', 'book_id');
	}

	public function BookAudit()
	{
		return $this->hasOne('App\BookAudit', 'book_id');
	}
	
	public function Tranx()
	{
		return $this->hasMany('App\Tranx', 'book_id');
	}
}
