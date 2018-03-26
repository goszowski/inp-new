<div class="form-group {{ $errors->has($field->name.'.'.$language->id) ? ' has-error' : '' }}">
	<label class="col-sm-2" for="{{ $field->name }}-{{ $language->id }}">{{ $field->display_name }}</label>
	<div class="col-sm-10">
		<div class="input-group input-group-sm">
			<input 
				maxlength="{{ $field->getLength() }}" 
				type="text" 
				class="form-control input-sm has-progress" 
				name="{{ $field->name }}[{{ $language->id }}]" 
				id="{{ $field->name }}-{{ $language->id }}" 
				value="{{ old($field->name.'.'.$language->id) ?: $value }}">
			<div class="input-group-btn">
				<button data-toggle="modal" data-target="#mFiles{{$language->id}}-{{$field->name}}" type="button" class="btn btn-primary js-select-file">Вибрати файл</button>
			</div>
		</div>


		@if($field->hint)
			<div class="text-muted"><small>{{ $field->hint }}</small></div>
		@endif

		@if ($errors->has($field->name.'.'.$language->id))
			<span class="help-block">
				<strong>{{ $errors->first($field->name.'.'.$language->id) }}</strong>
			</span>
		@endif

		<div class="modal fade" id="mFiles{{$language->id}}-{{$field->name}}" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Select the file</h4>
			  </div>
			  <div class="modal-body">
				<div class="js-mFiles-list"></div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
	</div>
</div>
