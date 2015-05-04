@extends('app')

@section('content')
	<h4>Book Transactions</h4>
	<table class="table-striped">
		<tr>
			<th>Title</th>
			<th>Borrower</th>
			<th>borrowed on</th>
			<th>due date</th>
			<th>returned</th>
		</tr>
		
		@foreach($records as $record)
			<tr>
				<td class="col-md-5">{{$record->title}}</td>
				<td class="col-md-3">{{$record->name}}</td>
				<td class="col-md-1">{{$record->borrow_dt}}</td>
				<td class="col-md-1">{{$record->due_dt}}</td>
				<td class="col-md-2">
					<a href="{{ url('edit', $record->id ) }}">Returned</a>
				</td>
			</tr>
		@endforeach
	</table>
	{!!$records->render()!!}
@endsection
