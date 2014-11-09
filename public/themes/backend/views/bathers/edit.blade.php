{{ Form::open(array('action' => array('BathersController@update',$bather->id), 'method' => 'put', 'class' => 'form-horizontal bucket-form', 'enctype' => 'multipart/form-data')) }}
	<section class="panel">
		<header class="panel-heading">
			CO - Bather
			<div class="pull-right">
				<button type="submit" class="btn btn-primary">Edit</button>
			</div>
			<div class="clearfix"></div>
		</header>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-md-2">Image</label>
				<div class="col-md-10">
					<div class="fileupload fileupload-{{ !empty($bather->image) ? 'exists' : 'new'}}" data-provides="fileupload">
						<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
							<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=image" alt="">
						</div>
						<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
							@if(!empty($bather))
							<img src='{{ !empty($bather->image) ? $bather->image : "" }}'>
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
                <label class="control-label col-md-2">Image(optional)</label>
                <div class="col-md-4">
                    <input type="file" name="image_add[]" class="default" multiple />
                </div>
            </div>

            <div class="form-group">
				<label class="col-sm-2 control-label">Title</label>
				<div class="col-sm-6">
					<input name="name"  type="text" value="{{ $bather->name }}" class="form-control" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Dealer</label>
				<div class="col-sm-6">
					<input name="dealer"  type="text" value="{{ $bather->dealer }}" class="form-control" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Tel</label>
				<div class="col-sm-6">
					<input name="tel"  type="text" value="{{ $bather->tel }}" class="form-control" >
				</div>
			</div>
			
			
            <div class="form-group {{ !empty($errors->first('expire')) ? 'has-error' : '' }}">
                <label class="control-label col-md-2">Expiration</label>
                <div class="col-md-4">
                    <div class="input-group date form_datetime-component">
                        <input type="text" name="expire" class="form-control" value="{{ $bather->expire }}" readonly="" size="16" required>
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-primary date-set"><i class="fa fa-calendar"></i></button>
                        </span>

                    </div>
                    @if(!empty($errors->first('expire')))
                    <p class="help-block">{{ $errors->first('expire') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
				<label class="col-sm-2 control-label">Dealer Price</label>
				<div class="col-sm-6">
					<input name="dealer_price" value="{{ $bather->dealer_price }}" type="number" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Amed Price</label>
				<div class="col-sm-6">
					<input name="amed_price"  value="{{ $bather->amed_price }}" type="number" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description</label>
				<div class="col-md-10">
					<textarea name="description"  class="ckeditor form-control" rows="6">{{ $bather->description }}</textarea>
				</div>
			</div>
			
			
		
		</div>
	</section>
{{ Form::close() }}