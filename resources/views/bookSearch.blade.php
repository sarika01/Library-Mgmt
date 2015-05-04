@extends('app')

@section('content')
	{!! Form::open(['url'=>'search']) !!}
		{!! Form::label('name', 'Enter name:')!!}
		{!! Form::text('name') !!}
		{!! Form::submit('Search')!!}
	{!! Form::close() !!}
	<br>
	<div class="container">
		<ul>
			@foreach($books as $book)
				<li><a href="{{ url('show', $book->book_id ) }}">{{ $book->title }} - {{ $book->author }}</a> </li>
			@endforeach
		</ul>
		{!! $books->render() !!}
	</div>
@endsection