@extends('app')

@section('content')
	<h4>Details of book</h4>
		{!! Form::label('title', 'Title of the book:')!!}
		{!! Form::text('title') !!}<br>
		{!! Form::label('author', 'Author:')!!}
		{!! Form::text('author') !!}<br>
		{!! Form::label('publication', 'Publication:')!!}
		{!! Form::text('publication') !!}<br>
		{!! Form::label('excerpt', 'Excerpt:')!!}
		{!! Form::text('excerpt') !!}<br>
		{!! Form::label('category', 'Category:')!!}
		{!! Form::text('category') !!}<br>
		{!! Form::label('total', 'No. of copies:')!!}
		{!! Form::text('total') !!}<br>
	{!! Form::submit($SubmitButtonText)!!}

	@if ($errors->any())
		<div style="color:RED">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

@endsection