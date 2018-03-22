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
				@foreach($items as $item)
					<tr>
						<td><a href="{{ lPath($item->node->path->name) }}">{{ $item->name }}</a></td>
					</tr>
				@endforeach
			</table>
		</div>

		{!! $items->render() !!}
	</div>
@endsection
