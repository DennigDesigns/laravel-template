@extends('layouts.app')

@section('title','products')

@section('content')

<div class="container">

	<div class="row">
	{{ $products->id }}

			<strong>{{ $products->name }}</strong>
			<br />
			{{ $products->description }}
			<br />
	</div>


</div>            

@endsection