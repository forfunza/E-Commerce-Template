{{ Form::open(array('action' => array('ContactsController@update',$contact->id), 'method' => 'put', 'class' => 'form-horizontal bucket-form', 'enctype' => 'multipart/form-data')) }}
	<section class="panel">
		<header class="panel-heading">
			About
			<div class="pull-right">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
			<div class="clearfix"></div>
		</header>
		<div class="panel-body">

			<div class="form-group">
				<label class="control-label col-md-2">Image</label>
				<div class="col-md-10">
					<div class="fileupload fileupload-{{ !empty($contact->image) ? 'exists' : 'new'}}" data-provides="fileupload">
						<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
							<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=image" alt="">
						</div>
						<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
							@if(!empty($contact))
							<img src='{{ !empty($contact->image) ? $contact->image : "" }}'>
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
				<label class="col-sm-2 control-label">Company Name(Eng)</label>
				<div class="col-md-10">
					<input name="name_1" type="text"  class="form-control" value="{{ $contact->name_1 }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Company Name(Thai)</label>
				<div class="col-md-10">
					<input name="name_2" type="text"  class="form-control" value="{{ $contact->name_2 }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Address</label>
				<div class="col-md-10">
					<textarea name="address"  class="form-control" rows="6">{{ $contact->address }}</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tel</label>
				<div class="col-md-10">
					<input name="tel" type="text"  class="form-control" value="{{ $contact->tel }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Fax</label>
				<div class="col-md-10">
					<input name="fax" type="text"  class="form-control" value="{{ $contact->fax }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Company Email</label>
				<div class="col-md-10">
					<input name="email_1" type="text"  class="form-control" value="{{ $contact->email_1 }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Career Email</label>
				<div class="col-md-10">
					<input name="email_2" type="text"  class="form-control" value="{{ $contact->email_2 }}">
				</div>
			</div>
		
		</div>
	</section>
{{ Form::close() }}