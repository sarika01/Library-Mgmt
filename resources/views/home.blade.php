@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<div class="jumbotron">
				<center>Welcome {{ Auth::user()->name }}!</center>
			</div>
		</div>
	</div>
</div>
@endsection

