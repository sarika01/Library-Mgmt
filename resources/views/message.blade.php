@extends('app')

@section('content')
	<div class="col-md-6 col-md-offset-1" align="center">
		<div class="jumbotron">
			{!! Form::open(['method'=>'GET', 'url'=>'book'])!!}
			{!! Form::label('message',$message)!!}<br>
			{!! Form::submit('ok')!!}
			{!! Form::close() !!}
		</div>
	</div>
@endsection