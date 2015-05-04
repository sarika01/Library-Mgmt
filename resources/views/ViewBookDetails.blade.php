@extends('app')

@section('content')
	<h4>Details of book</h4>
	@foreach($Book as $a)
		@foreach($BookDetail as $b)
			{!! Form::Open(['url'=>['issue', $a->book_id]]) !!}
			<div class="jumbotron">
				Title of the book: {{$a->title}}<br>
				Author: {!! $a->author !!}<br>
				Publication: {!! $b->publication !!}<br>
				Excerpt: {!! $b->excerpt !!}<br>
				Category: {!! $b->category !!}<br>
			</div>	
			{!! Form::submit('Borrow book')!!}
			{!! Form::close() !!}
		@endforeach
	@endforeach
	
@endsection

