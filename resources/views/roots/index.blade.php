@extends('layouts.app')

@section('content')
	<div class="container">
		<ul>
			@foreach($roots as $k=>$root)
				<li>#item {{ $root->is_active }}</li>
			@endforeach
		</ul>
	</div>
@endsection
