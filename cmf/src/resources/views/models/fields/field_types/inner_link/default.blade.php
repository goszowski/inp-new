<div class="form-group {{ $errors->has($field->name.'.'.$language->id) ? ' has-error' : '' }}">
	<label class="col-sm-2" for="{{ $field->name }}-{{ $language->id }}">{{ $field->display_name }}</label>
	<div class="col-sm-10">

		<input type="hidden" name="{{ $field->name }}[{{ $language->id }}]" value="">

		<select 
			class="form-control input-sm inner-link-search" 
			style="width: 100%;" 
			name="{{ $field->name }}[{{ $language->id }}]" 
			id="{{ $field->name }}-{{ $language->id }}">

			@if($value)
				<option value="{{ $value->node_id }}" selected>{{ $value->name }}</option>
			@endif
		</select>

		@if($field->hint)
			<div class="text-muted"><small>{{ $field->hint }}</small></div>
		@endif

		@if ($errors->has($field->name.'.'.$language->id))
			<span class="help-block">
				<strong>{{ $errors->first($field->name.'.'.$language->id) }}</strong>
			</span>
		@endif
	</div>
</div>
