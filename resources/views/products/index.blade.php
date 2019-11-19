@extends('layouts.app')

@section('title','products')

@section('content')
<div class="container">
	<div class="row">
		<ul>
		@foreach ($products as $product)
		<a href="/products/{{ $product->id }}/edit">
			<div class="col-xs-3">
				<li>
					<strong>{{ $product->name }}</strong>:&nbsp; {{ $product->description }}
				</li>
			</div>
		</a>	
		@endforeach
	</ul>
	</div>
	
	<div class="row">
		&nbsp;<a href="{{ url('/products/create') }}">create new product</a>
	</div>
	
</div>	
			
@endsection