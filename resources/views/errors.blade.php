@if ($errors->any())

<!--display errors if any exist-->
<div class="row">
	<div class="col-sm-12">
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	</div>
</div>

@endif