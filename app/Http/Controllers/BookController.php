<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Request;
use Carbon\Carbon;
use DB;

class BookController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$books = \App\Book::paginate(5);
		return view('bookSearch', compact('books'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Requests\OnlyManagerRequest $request)
	{
		return view('CreateBookDetails');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CreateBookRequest $request)
	{
		$data = new \App\Book($request->all());
		$data->save();
		$insertedId = $data->id;
		$data1 = new \App\BookDetail($request->all());
		$data1->book_id= $insertedId;
		$data1->save();
		$data2 = new \App\BookAudit($request->all());
		$data2->book_id= $insertedId;
		$data2->available= $data2->total;
		$data2->save(); 
		
		return $insertedId;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$Book = \App\Book::where('book_id', $id)->get();
		$BookDetail = \App\BookDetail::where('book_id', $id)->get();
		return view('ViewBookDetails', compact('Book', 'BookDetail'));
	}

	public function issue($id)
	{
		$allowed = \App\Tranx::where('user_id', \Auth::user()->id)
				->where('return_dt', null)
				->count();
		if ( $allowed > 1)
			$message = "you can borrow only two books at a time";
		else{
			$book = \App\BookAudit::where('book_id', $id)->first();
			
			if ($book->available)
			{
				$transaction = new \App\Tranx();
				$transaction->book_id = $id;
				$transaction->user_id = \Auth::user()->id;
				$transaction->borrow_dt = Carbon::now();
				$transaction->due_dt = Carbon::now()->addDays(10);
				$transaction->save();
				
				$book->available = $book->available - 1;
				$book->save(); 
				
				$message = 'The book has been issued to you';
				
			}
			else
				$message = 'This book is not available';
		}

		return view('message')->with('message', $message);
		
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$transaction = \App\Tranx::where('id',$id)->first();
		$transaction->return_dt = \Carbon\Carbon::now();
		$transaction->save();
		$bookAudit = $transaction->bookAudit;
		$bookAudit->available = $bookAudit->available + 1;
		$bookAudit->save();
		return redirect('history');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
	}

	
	public function getSearch()
	{
		$keyword= Request::get('name');
		$books = \App\Book::where('title', 'LIKE', '%'.$keyword.'%')->paginate(5);
		return view('bookSearch', compact('books'));
    }
	
	public function borrowedBooks()
	{
		$dueBooks = DB::table('book_tranx')
            ->join('books', 'book_tranx.book_id', '=', 'books.book_id')
            ->select('book_tranx.borrow_dt', 'book_tranx.due_dt', 'books.title')
			->where('book_tranx.return_dt', '=', null)
			->where('book_tranx.user_id', \Auth::user()->id)
            ->get();
		return view('dueBooks', compact('dueBooks'));
	}

	public function showTransactions(Requests\OnlyManagerRequest $request)
	{
		$records = DB::table('book_tranx')
            ->join('books', 'book_tranx.book_id', '=', 'books.book_id')
            ->join('users', 'book_tranx.user_id', '=', 'users.id')
            ->select('book_tranx.id', 'book_tranx.borrow_dt', 
					'book_tranx.due_dt', 'books.title', 'users.name')
			->where('book_tranx.return_dt', '=', null)
            ->paginate(5);
		
		return view('bookTranx', compact('records'));
		
	}
}
