<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
				SlideShow                
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="{{ action('SlideshowsController@create') }}">
                            <button id="editable-sample_new" class="btn btn-primary">
                            Add <i class="fa fa-plus"></i>
                            </button>
                            </a>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th width="150">Edit</th>
                                <th width="150">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(!empty($slideshows))
                            @foreach ($slideshows as $slide)
                            <tr>
                                <td>
                                	<div class="fileupload fileupload-new">
										<div class="fileupload-new thumbnail" style="width: 200 !important; height: 150px !important;">
											<img src="{{ $slide->image }}" alt="">
										</div>
									</div>
								</td>
                                <td><a class="btn btn-info" href="{{ action('SlideshowsController@edit',$slide->id) }}">Edit</a></td>
                                <td>
                                {{ Form::open(array('action' => array('SlideshowsController@destroy', $slide->id), 'method' => 'delete')) }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                                {{ Form::close() }}
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>