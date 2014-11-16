<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Promotion Order    
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                            	<th>ID</th>
                            	<th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th width="150">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(!empty($promotionorders))
                            @foreach ($promotionorders as $order)
                            <tr>
                            	<td>{{ $order->invoice_id }}</td>
                                <td>{{ $order->firstname.' '.$order->lastname }}</td>
                                <td>{{ $order->email }}</td>
                                <td>
                                	@if($order->order_status == '1')
                                		รอชำระเงิน
                                	@elseif($order->order_status == '2')
                                		ดำเนินการ
                                	@elseif($order->order_status == '3')
                                		เรียบร้อย
                                	@endif

                                </td>
                                <td><a class="btn btn-info" href="{{ action('PromotionOrdersController@edit',$order->id) }}">Edit</a></td>
                               
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