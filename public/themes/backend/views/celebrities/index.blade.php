<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
				Celebrities                
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="{{ action('CelebritiesController@create') }}">
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
                        @if(!empty($celebrities))
                            @foreach ($celebrities as $celeb)
                            <tr>
                                <td>
                                	<div class="fileupload fileupload-new">
										<div class="fileupload-new thumbnail" style="width: 200 !important; height: 150px !important;">
											<img src="{{ $celeb->image }}" alt="">
										</div>
									</div>
								</td>
                                <td><a class="btn btn-info" href="{{ action('CelebritiesController@edit',$celeb->id) }}">Edit</a></td>
                                <td>
                                {{ Form::open(array('action' => array('CelebritiesController@destroy', $celeb->id), 'method' => 'delete')) }}
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