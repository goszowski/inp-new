@extends('layouts.app')

@section('content')
	<div class="container">
		<ul>
			@foreach($sections as $k=>$section)
				<li>#item {{ $section->is_active }}</li>
			@endforeach
		</ul>
	</div>
@endsection
