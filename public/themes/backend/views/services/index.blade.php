<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Services
                
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="{{ action('ServicesController@create') }}">
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
                            	<th>Name</th>
                                <th>Category</th>
                                <th width="150">Edit</th>
                                <th width="150">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(!empty($services))
                            @foreach ($services as $service)
                            <tr>
                            	<td>{{ $service->name }}</td>
                                <td>{{ $service->category->name }}</td>
                                <td><a class="btn btn-info" href="{{ action('ServicesController@edit',$service->id) }}">แก้ไข</a></td>
                                <td>
                                {{ Form::open(array('action' => array('ServicesController@destroy', $service->id), 'method' => 'delete')) }}
                                <button type="submit" class="btn btn-danger">ลบ</button>
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