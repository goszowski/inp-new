@extends('layouts.app')

@section('content')
	<div class="jumbotron">
		<div class="container text-center">
			<h1 style="font-size: 22px">{{ $fields->name }}</h1>
		</div>
	</div>

	<div class="container">
		<div class="table-responsive">
			<table class="table">
				@foreach($descriptions as $description)
					<tr>
						<td><a href="{{ lPath($description->node->path->name) }}">{{ $description->name }}</a></td>
					</tr>
				@endforeach
			</table>
		</div>

		{!! $descriptions->render() !!}
	</div>
@endsection
