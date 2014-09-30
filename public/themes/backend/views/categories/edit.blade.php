{{ Form::open(array('action' => array('CategoriesController@update',$category->id), 'method' => 'put', 'class' => 'form-horizontal bucket-form')) }}
	<section class="panel">
		<header class="panel-heading">
			Categories
			<div class="pull-right">
				<button type="submit" class="btn btn-primary">Edit</button>
			</div>
			<div class="clearfix"></div>
		</header>
		<div class="panel-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Name</label>
				<div class="col-sm-6">
					<input name="name" value="{{ $category->name }}" type="text" class="form-control" required>
				</div>
			</div>
		</div>
	</section>
{{ Form::close() }}