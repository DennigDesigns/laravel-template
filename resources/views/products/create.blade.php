@extends('layouts.app')

@section('title','add product')

@section('content')

<div class="container">

	@include('errors') {{--this references errors.blade.php --}}

	<div class="row">
	
		<form method="POST" action="/products">
			@csrf
		
			<div class="input-group mb-3">
		  	  <input type="text" class="form-control" placeholder="product name" aria-label="product name" aria-describedby="button-addon2" name="name" required>
			</div>
			<div class="input-group mb-3">
		  	  <textarea class="form-control" placeholder="description" aria-label="description" aria-describedby="button-addon2" name="description" required></textarea>
			</div>
			<button type="submit">submit</button>
		
		</form>

	</div>       
      
</div>       
			
@endsection