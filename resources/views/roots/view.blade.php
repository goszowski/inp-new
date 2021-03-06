@extends('layouts.app')

@section('content')
	<div class="jumbotron">
		<div class="container text-center">
			<h1>{{ $fields->name }}</h1>
		</div>
	</div>

	<div class="container">
		<div class="table-responsive">
			<table class="table">
				@foreach($funds as $fund)
					<tr>
						<td><a href="{{ lPath($fund->node->path->name) }}">{{ $fund->name }}</a></td>
					</tr>
				@endforeach
			</table>
		</div>

		{!! $funds->render() !!}
	</div>
@endsection
