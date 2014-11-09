<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Branch
                
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="{{ action('BranchesController@create') }}">
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
                                <th width="150">Edit</th>
                                <th width="150">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(!empty($branches))
                            @foreach ($branches as $branch)
                            <tr>
                                <td>{{ $branch->name }}</td>
                                <td><a class="btn btn-info" href="{{ action('BranchesController@edit',$branch->id) }}">Edit</a></td>
                                <td>
                                {{ Form::open(array('action' => array('BranchesController@destroy', $branch->id), 'method' => 'delete')) }}
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