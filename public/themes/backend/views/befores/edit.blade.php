{{ Form::open(array('action' => array('BeforesController@update',$before->id), 'method' => 'put', 'class' => 'form-horizontal bucket-form', 'enctype' => 'multipart/form-data')) }}
	<section class="panel">
		<header class="panel-heading">
			Before & After
			<div class="pull-right">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
			<div class="clearfix"></div>
		</header>
		<div class="panel-body">

			<div class="form-group">
				<label class="control-label col-md-2">Image</label>
				<div class="col-md-10">
					<div class="fileupload fileupload-{{ !empty($before->image) ? 'exists' : 'new'}}" data-provides="fileupload">
						<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
							<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=image" alt="">
						</div>
						<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
							@if(!empty($before))
							<img src='{{ !empty($before->image) ? $before->image : "" }}'>
							@endif
						</div>
						<div>
							<span class="btn btn-white btn-file">
							<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Choose</span>
							<span class="fileupload-exists"><i class="fa fa-undo"></i> Change </span>
							<input type="file" name="image" class="default">
							</span>
							<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Delete</a>
						</div>
					</div>
				</div>
				
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Name</label>
				<div class="col-sm-6">
					<input name="name" value="{{ $before->name }}" type="text" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Author</label>
				<div class="col-sm-6">
					<input name="author" value="{{ $before->author }}" type="text" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description</label>
				<div class="col-md-10">
					<textarea name="description"  class="ckeditor form-control" rows="6">{{ $before->description }}</textarea>
				</div>
			</div>
		
		</div>
	</section>
{{ Form::close() }}