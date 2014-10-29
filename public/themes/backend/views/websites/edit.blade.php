{{ Form::open(array('action' => array('WebsitesController@update',$website->id), 'method' => 'put', 'class' => 'form-horizontal bucket-form', 'enctype' => 'multipart/form-data')) }}
	<section class="panel">
		<header class="panel-heading">
			About
			<div class="pull-right">
				<button type="submit" class="btn btn-primary">Edit</button>
			</div>
			<div class="clearfix"></div>
		</header>
		<div class="panel-body">

			<div class="form-group">
				<label class="control-label col-md-2">Image</label>
				<div class="col-md-10">
					<div class="fileupload fileupload-{{ !empty($website->image) ? 'exists' : 'new'}}" data-provides="fileupload">
						<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
							<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=image" alt="">
						</div>
						<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
							@if(!empty($website))
							<img src='{{ !empty($website->image) ? $website->image : "" }}'>
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
				<label class="col-sm-2 control-label">Call Center</label>
				<div class="col-md-10">
					<input name="callcenter" type="text"  class="form-control" value="{{ $website->callcenter }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Facebook Page</label>
				<div class="col-md-10">
					<input name="facebook" type="text"  class="form-control" value="{{ $website->facebook }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Instagram Page</label>
				<div class="col-md-10">
					<input name="instagram" type="text"  class="form-control" value="{{ $website->instagram }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">SocialCam Page</label>
				<div class="col-md-10">
					<input name="socialcam" type="text"  class="form-control" value="{{ $website->socialcam }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Youtube Offical</label>
				<div class="col-md-10">
					<input name="youtube" type="text"  class="form-control" value="{{ $website->youtube }}">
				</div>
			</div>
			
		
		</div>
	</section>
{{ Form::close() }}