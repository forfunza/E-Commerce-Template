{{ Form::open(array('action' => array('PromotionsController@update', $promotion->id), 'method' => 'put', 'class' => 'form-horizontal bucket-form', 'enctype' => 'multipart/form-data')) }}
	<section class="panel">
		<header class="panel-heading">
			Promotion
			<div class="pull-right">
				<button type="submit" class="btn btn-primary">Edit</button>
			</div>
			<div class="clearfix"></div>
		</header>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-md-2">Image</label>
				<div class="col-md-10">
					<div class="fileupload fileupload-{{ !empty($promotion->image) ? 'exists' : 'new' }}" data-provides="fileupload">
						<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
							<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=image" alt="">
						</div>
						<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
							@if(!empty($promotion))
							<img src='{{ !empty($promotion->image) ? $promotion->image : "" }}'>
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
					<input name="name" value="{{ $promotion->name }}" type="text" class="form-control" required>
				</div>
			</div>
			
			
            <div class="form-group {{ $errors->first('expire') ? 'has-error' : '' }}">
                <label class="control-label col-md-2">Expiration</label>
                <div class="col-md-4">
                    <div class="input-group date form_datetime-component">
                        <input type="text" name="expire" class="form-control" readonly="" value="{{ $promotion->expire }}" size="16" required>
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-primary date-set"><i class="fa fa-calendar"></i></button>
                        </span>

                    </div>
                    @if($errors->first('expire'))
                    <p class="help-block">{{ $errors->first('expire') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
				<label class="col-sm-2 control-label">Price</label>
				<div class="col-sm-6">
					<input name="price" value="{{ $promotion->price }}" type="text" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description</label>
				<div class="col-md-10">
					<textarea name="description"  class="ckeditor form-control" rows="6">{{ $promotion->description }}</textarea>
				</div>
			</div>
			
			
		
		</div>
	</section>
{{ Form::close() }}