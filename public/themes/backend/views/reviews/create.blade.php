{{ Form::open(array('action' => array('ReviewsController@store'), 'method' => 'post', 'class' => 'form-horizontal bucket-form', 'enctype' => 'multipart/form-data')) }}
	<section class="panel">
		<header class="panel-heading">
			Reviews
			<div class="pull-right">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
			<div class="clearfix"></div>
		</header>
		<div class="panel-body">

			<div class="form-group">
				<label class="control-label col-md-2">Image</label>
				<div class="col-md-10">
					<div class="fileupload fileupload-new" data-provides="fileupload">
						<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
							<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=image" alt="">
						</div>
						<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
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
					<input name="name" value="" type="text" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Highlight</label>
				<div class="col-sm-10">
					<input name="highlight" value="" type="text" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description</label>
				<div class="col-md-10">
					<textarea name="description"  class="ckeditor form-control" rows="6"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Video (Youtube)</label>
				<div class="col-sm-6">
					<input name="youtube" value="" type="text" class="form-control" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Link</label>
				<div class="col-sm-6">
					<input name="url" value="" type="text" class="form-control" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tel</label>
				<div class="col-sm-6">
					<input name="tel" value="" type="text" class="form-control" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Facebook</label>
				<div class="col-sm-6">
					<input name="facebook" value="" type="text" class="form-control" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Instagram</label>
				<div class="col-sm-6">
					<input name="instagram" value="" type="text" class="form-control" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Line</label>
				<div class="col-sm-6">
					<input name="line" value="" type="text" class="form-control" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Website</label>
				<div class="col-sm-6">
					<input name="website" value="" type="text" class="form-control" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Home Page</label>
				<div class="col-sm-1">
					<input name="home" type="checkbox" value="1" class="form-control"/>
				</div>
			</div>
		
		</div>
	</section>
{{ Form::close() }}