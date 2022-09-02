@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<table class="table table-striped">
        		<thead>
        			<th>Title</th>
        			<th>Price</th>
        			<th>Author</th>
        			<th>Added At</th>
        			<th>Add Voucher</th>
        		</thead>
        		<tbody>
        			@foreach($books as $book)
        			<tr>
        				<td>{{ $book->title }}</td>
        				<td>{{ $book->price }}</td>
        				<td>{{ $book->author->name }}</td>
        				<td>{{ $book->created_at->diffforhumans() }}</td>
        				<td>
        					<a class="btn btn-primary" href="{{ route('book.voucher', [$book->id]) }}">
        						Attach Voucher
        					</a>
        				</td>
        			</tr>
        			@endforeach
        		</tbody>
        	</table>  
        	<div>
        		{{ $books->links('vendor.pagination.bootstrap-4') }}              
        	</div>
        </div>
    </div>
</div>
@endsection
