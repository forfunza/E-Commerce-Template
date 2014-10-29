{{ Form::open(array('action' => array('CareersController@update',$career->id), 'method' => 'put', 'class' => 'form-horizontal bucket-form')) }}
	<section class="panel">
		<header class="panel-heading">
			Career
			<div class="pull-right">
				<button type="submit" class="btn btn-primary">Edit</button>
			</div>
			<div class="clearfix"></div>
		</header>
		<div class="panel-body">

			

			<div class="form-group">
				<label class="col-sm-2 control-label">Name</label>
				<div class="col-sm-6">
					<input name="name" value="{{ $career->name }}" type="text" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Requirement</label>
				<div class="col-md-10">
					<textarea name="requirement"  class="ckeditor form-control" rows="6">{{ $career->requirement }}</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Identify</label>
				<div class="col-md-10">
					<textarea name="identify"  class="ckeditor form-control" rows="6">{{ $career->identify }}</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Other</label>
				<div class="col-md-10">
					<textarea name="other"  class="ckeditor form-control" rows="6">{{ $career->other }}</textarea>
				</div>
			</div>
		
		</div>
	</section>
{{ Form::close() }}