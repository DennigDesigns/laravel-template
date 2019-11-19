@extends('layouts.app')

@section('title','hi')

@section('content')
	<div class="container">
            
        <div class="title m-b-md">
            Recipes
        </div>

        <div class="row">
        <ul>
        @foreach ($products as $product)
            <a href="/products/{{ $product->id }}" title="click here to view recipe">
                <div class="col-xs-3">
                    <li>
                        <strong>{{ $product->name }}</strong>:&nbsp; {{ $product->description }}
                    </li>
                </div>
            </a>
        @endforeach
    </ul>
    </div>

        <div class="links">
            <a href="https://laravel.com/docs">Documentation</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
		
	</div>
			
@endsection