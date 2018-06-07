@extends('runsite::layouts.nodes')

@section('node')
	@if(count($history))
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Назва поля</th>
					{{-- <th>Мова</th> --}}
					<th>Значення</th>
					<th>Дата зміни</th>
					<th>Користувач, що вніс зміни</th>
				</tr>
			</thead>
			<tbody>
				@foreach($node->model->fields as $field)
					@php($fieldHistory = $history->where('field_id', $field->id))
					<tr>
						<td rowspan="{{ (count($fieldHistory)) }}"><b>{{ $field->display_name }}</b></td>

						@php($firstObject =  $fieldHistory->first())
						<td>
							@if($field->type()::$needField)
								{{$firstObject->value }}
							@else
								<small class="text-muted">
									Неможливо зберігати історію реляцій "один до багатьох"
								</small>
							@endif
							
						</td>
						<td>
							{{ $firstObject->created_at->format('d.m.Y H:i:s') }}
						</td>
						<td>
							@if($firstObject->user)
								{{ $firstObject->user->name }}
							@else
								<small class="text-muted">Інформація відсутня</small>
							@endif
						</td>
					</tr>

					@php($i=0)
					@foreach($fieldHistory as $fieldHistoryItem)
						@if($i)
							<tr>
								<td>
									{{ $fieldHistoryItem->value }}
								</td>
								<td>
									{{ $fieldHistoryItem->created_at->format('d.m.Y H:i:s') }}
								</td>
								<td>
									@if($fieldHistoryItem->user)
										{{ $fieldHistoryItem->user->name }}
									@else
										<small class="text-muted">Інформація відсутня</small>
									@endif
								</td>
							</tr>
						@endif
						@php($i++)
					@endforeach

					
				@endforeach
			</tbody>
		</table>
	@else
		Інформація відсутня
	@endif
@endsection
