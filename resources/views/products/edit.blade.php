@extends('layouts.app')

@section('title','edit')

@section('content')

<div class="container">

	<div class="row">
		<div class="col-sm-12">	
			<h1>Edit Product {{$products->id}}</h1>
		</div>
	</div>

	@include('errors') {{--this references errors.blade.php --}}

	<div class="row">
	
		<form method="POST" action="/products/{{$products->id}}">
			@method('PATCH')
		
			@csrf
			
			<div class="input-group mb-3">
		  	  <input type="text" class="form-control" placeholder="product name" aria-label="product name" aria-describedby="button-addon2" name="name" value="{{ $products->name }}" required>
			</div>
			<div class="input-group mb-3">
		  	  <textarea class="form-control" placeholder="description" aria-label="description" aria-describedby="button-addon2" name="description" required>{{ $products->description }}</textarea>
			</div>
			<button type="submit" class="button btn-success">submit</button>
		
		</form>
	
	</div>
	<br />
	<div class="row">
		
		<form method="POST" action="/products/{{$products->id}}">
			@method('DELETE')
		
			@csrf
		
			<button type="submit" class="button btn-danger">Delete project</button>
		
		</form>
	
	</div>

</div>            
      
          
			
@endsection