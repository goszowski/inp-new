@extends('layouts.app')

@section('content')
	<div class="container">
		<ul>
			@foreach($pages as $k=>$page)
				<li>#item {{ $page->is_active }}</li>
			@endforeach
		</ul>
	</div>
@endsection
