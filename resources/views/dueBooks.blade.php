@extends('app')

@section('content')
	<h4>Books Borrowed</h4>
	<table class="table-striped">
		<tr>
			<th class="col-md-6">Title</th>
			<th class="col-md-3">borrowed on</th>
			<th class="col-md-3">need to return on</th>
		</tr>	
		@foreach($dueBooks as $book)
			<tr>
				<td>{{$book->title}}</td>
				<td>{{$book->borrow_dt}}</td>
				<td>{{$book->due_dt}}</td>
			</tr>
		@endforeach
	</table>
@endsection
