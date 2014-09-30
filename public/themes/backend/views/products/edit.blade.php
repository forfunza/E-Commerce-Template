{{ Form::open(array('action' => array('ProductsController@update',$product->id), 'method' => 'put', 'class' => 'form-horizontal bucket-form', 'enctype' => 'multipart/form-data')) }}
	<section class="panel">
		<header class="panel-heading">
			Products
			<div class="pull-right">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
			<div class="clearfix"></div>
		</header>
		<div class="panel-body">

			<div class="form-group">
				<label class="control-label col-md-2">Image</label>
				<div class="col-md-10">
					<div class="fileupload fileupload-{{ !empty($product->image) ? 'exists' : 'new'}}" data-provides="fileupload">
						<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
							<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=image" alt="">
						</div>
						<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
							@if(!empty($product))
							<img src='{{ !empty($product->image) ? $product->image : "" }}'>
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
				<label class="col-sm-2 control-label">Category</label>
				<div class="col-sm-6">
					<select name="category_id" class="form-control">
						@foreach ($categories as $category)
							<option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Code</label>
				<div class="col-sm-6">
					<input name="code" value="{{ $product->code }}" type="text" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Name</label>
				<div class="col-sm-6">
					<input name="name" value="{{ $product->name }}" type="text" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">highlight</label>
				<div class="col-sm-6">
					<input name="highlight" value="{{ $product->highlight }}" type="text" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">Description</label>
				<div class="col-md-10">
					<textarea name="description"  class="wysihtml5 form-control" rows="6" required>{{ $product->description }}</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Quantity</label>
				<div class="col-sm-6">
					<input name="quantity" value="{{ $product->quantity }}" type="number" class="form-control" required>
				</div>
			</div>
		</div>
	</section>
{{ Form::close() }}