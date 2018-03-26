@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading text-center">
				Архів усної історії<br>
				Український інститут національної пам'яті
			</div>
			<div class="panel-body">
				

				@foreach($fields->speakers as $k=>$speaker)
					<div class="row">
						@if($speaker->image->value)
							<div class="col-xs-6">
								<img src="{{ $speaker->image->max() }}" class="img-responsive" style="width: 200px;" alt="{{ $speaker->name }}">
							</div>
						@endif
						<div class="col-xs-6">
							@if(! $k)
								<p>{{ $fund->name }}</p>
								<p>{{ $description->name }}</p>
								<p>Од. обл. {{ $fields->cypher }}. {{ $fields->name }}</p>
							@endif
						</div>
					</div>
					<h2 class="h3"><b>
						{{ $speaker->name }} {{ $speaker->parent_name }}
						@if($speaker->maiden_name)
							&nbsp;({{ $speaker->maiden_name }})
						@endif
					</b></h2>

					<table class="table table-striped">
						<thead>
							<tr>
								<th>Дата народження</th>
								<th>Місце народження</th>
								<th>Район народження</th>
								<th>Область народження</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ $speaker->birthday }}</td>
								<td>{{ $speaker->birthday_place->name ?? '-' }}</td>
								<td>{{ $speaker->birthday_district->name ?? '-' }}</td>
								<td>{{ $speaker->birthday_region->name ?? '-' }}</td>
							</tr>
						</tbody>
					
						<thead>
							<tr>
								<th>Псевдо</th>
								<th>Місце проживання</th>
								<th>Район проживання</th>
								<th>Область проживання</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ $speaker->nickname }}</td>
								<td>
									@if(count($speaker->live_places))
										@foreach($speaker->live_places as $lpk=>$live_place)
											{{ $live_place->name . (++$lpk < count($speaker->live_places) ? ', ' : null) }}
										@endforeach
									@else
										-
									@endif
								</td>
								<td>
									@if(count($speaker->live_districts))
										@foreach($speaker->live_districts as $ldk=>$live_district)
											{{ $live_district->name . (++$ldk < count($speaker->live_districts) ? ', ' : null) }}
										@endforeach
									@else
										-
									@endif
								</td>
								<td>
									@if(count($speaker->live_regions))
										@foreach($speaker->live_regions as $lrk=>$live_region)
											{{ $live_region->name . (++$lrk < count($speaker->live_regions) ? ', ' : null) }}
										@endforeach
									@else
										-
									@endif
								</td>
							</tr>
						</tbody>

						<thead>
							<tr>
								<th>Вид діяльності</th>
								<th>Громадська ініціатива/партія</th>
								<th>Категорія участі</th>
								<th>Мова оповіді</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									@if(count($speaker->activities))
										@foreach($speaker->activities as $ak=>$activity)
											{{ $activity->name . (++$ak < count($speaker->activities) ? ', ' : null) }}
										@endforeach
									@else
										Інформація відсутня
									@endif
									
								</td>
								<td>
									@if(count($speaker->initiatives))
										@foreach($speaker->initiatives as $ik=>$initiative)
											{{ $initiative->name . (++$ik < count($speaker->initiatives) ? ', ' : null) }}
										@endforeach
									@else
										Інформація відсутня
									@endif
									
								</td>
								<td>
									@if(count($speaker->participations))
										@foreach($speaker->participations as $pk=>$participation)
											{{ $participation->name . (++$pk < count($speaker->participations) ? ', ' : null) }}
										@endforeach
									@else
										Інформація відсутня
									@endif
									
								</td>
								<td>
									@if(count($speaker->languages))
										@foreach($speaker->languages as $lk=>$language)
											{{ $language->name . (++$lk < count($speaker->languages) ? ', ' : null) }}
										@endforeach
									@else
										Інформація відсутня
									@endif
									
								</td>
							</tr>
						</tbody>
					</table>
				@endforeach

				<br><br>
				{{-- Одиниці зберігання --}}
				<h2 class="h4 text-center">Одиниці зберігання</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>№ одиниці зберігання</th>
							<th>Назва</th>
							<th>Формат</th>
							<th>Об'єм</th>
							<th>Роздільна здатність</th>
							<th>Тривалість</th>
							<th>Дата створення</th>
						</tr>
					</thead>
					<tbody>
						@foreach($files as $file)
							<tr>
								<td>{{ $file->cypher }}</td>
								<td>
									<a href="{{ $file->file_name }}" class="{{ $file->canPreview() ? 'magnific' : null }}" target="_blank">
										{{ $file->name }}
									</a>
								</td>
								<td>{{ $file->format }}</td>
								<td>{{ $file->size }}</td>
								<td>{{ $file->resolution }}</td>
								<td>{{ $file->duration }}</td>
								<td>{{ $file->date_of_creation }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{{-- / Одиниці зберігання --}}

				<br><br>

				<h2 class="h4 text-center">Ключові слова (в тому числі дати, власні імена, географічні назви):</h2>
			</div>
			<div class="panel-footer">
				@foreach($fields->keywords as $k=>$keyword)
					{{ $keyword->name . ((++$k < count($fields->keywords)) ? ', ' : null) }}
				@endforeach
			</div>
		</div>
	</div>
@endsection
