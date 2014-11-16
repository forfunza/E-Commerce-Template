<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Service Discount   
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="{{ action('ServiceDiscountsController@create') }}">
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
                                <th>Email</th>
                                <th>Name</th>
                                <th width="150">View</th>
                                <th width="150">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(!empty($servicediscounts))
                            @foreach ($servicediscounts as $discount)
                            <tr>
                                <td>{{ $discount->firstname.' '.$discount->lastname }}</td>
                                <td>{{ $discount->email }}</td>
                                <td><a class="btn btn-info" href="{{ action('ServiceDiscountsController@show',$discount->id) }}">View</a></td>
                                <td>
                                {{ Form::open(array('action' => array('ServiceDiscountsController@destroy', $discount->id), 'method' => 'delete')) }}
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