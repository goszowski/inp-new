@extends('runsite::layouts.app')

@section('app')
	<div class="content">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Пошук</h3>
			</div>
			<div class="box-body">

				{!! Form::open(['route'=>'admin.boot', 'method'=>'get']) !!}

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="theme_id">Тема</label>
							<select name="theme_id" id="theme_id" class="form-control relation-to-one-search" data-related-model-name="theme">
								@if($theme)
									<option value="{{ $theme->node_id }}" selected="">{{ $theme->name }}</option>
								@endif
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="date_of_creation">Дата створення одиниці обліку</label>
							<input type="text" class="form-control" name="date_of_creation" id="date_of_creation" value="{{ request('date_of_creation') }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Прізвище</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ request('name') }}">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="nickname">Псевдо</label>
							<input type="text" class="form-control" name="nickname" id="nickname" value="{{ request('nickname') }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="gender_id">Стать</label>
							<select name="gender_id" id="gender_id" class="form-control relation-to-one-search" data-related-model-name="gender">
								@if($gender)
									<option value="{{ $gender->node_id }}" selected="">{{ $gender->name }}</option>
								@endif
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="birthday_place_id">Місце народження</label>
							<select name="birthday_place_id" id="birthday_place_id" class="form-control relation-to-one-search" data-related-model-name="birthday_place">
								@if($birthday_place)
									<option value="{{ $birthday_place->node_id }}" selected="">{{ $birthday_place->name }}</option>
								@endif
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="live_places">Місце проживання</label>
							<select name="live_places" id="live_places" class="form-control relation-to-one-search" data-related-model-name="live_place">
								@if($live_place)
									<option value="{{ $live_place->node_id }}" selected="">{{ $live_place->name }}</option>
								@endif
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="birthday">Дата народження</label>
							<input type="text" class="form-control" name="birthday" id="birthday" value="{{ request('birthday') }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="languages">Мова оповіді</label>
							<select name="languages" id="languages" class="form-control relation-to-one-search" data-related-model-name="language">
								@if($language)
									<option value="{{ $language->node_id }}" selected="">{{ $language->name }}</option>
								@endif
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="participations">Категорія участі</label>
							<select name="participations" id="participations" class="form-control relation-to-one-search" data-related-model-name="participation">
								@if($participation)
									<option value="{{ $participation->node_id }}" selected="">{{ $participation->name }}</option>
								@endif
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="keywords">Ключові слова</label>
							<select multiple name="keywords[]" id="keywords" class="form-control relation-to-one-search" data-related-model-name="keyword">
								@if($keywords and count($keywords))
									@foreach($keywords as $keyword)
										<option value="{{ $keyword->node_id }}" selected="">{{ $keyword->name }}</option>
									@endforeach
								@endif
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="file_type_id">Тип файлу</label>
							<select name="file_type_id" id="file_type_id" class="form-control relation-to-one-search" data-related-model-name="file_type">
								@if($file_type)
									<option value="{{ $file_type->node_id }}" selected="">{{ $file_type->name }}</option>
								@endif
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Пошук</button>
				</div>

				{!! Form::close() !!}
			</div>
		</div>

		@if(count($items))
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Результати пошуку</h3>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									@foreach($model->fields->where('is_visible_in_nodes_list', true) as $field)
										<th>{{ $field->display_name }}</th>
									@endforeach
								</tr>
							</thead>
							<tbody>
								@foreach($items as $item)
									<tr>
										@foreach($model->fields->where('is_visible_in_nodes_list', true) as $field)
											<td>
												@include('runsite::models.fields.field_types.'.$field->type()::$displayName.'._view', ['child'=>$item])
											</td>
										@endforeach
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		@endif
	</div>
@endsection
