{{ Form::open(array('action' => array('OrdersController@update',$order->id), 'method' => 'put', 'class' => 'form-horizontal bucket-form', 'enctype' => 'multipart/form-data')) }}
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body invoice">
                        <div class="invoice-header">
                            <div class="invoice-title col-md-3 col-xs-2">
                                <h1>Order</h1>
                                <img class="logo-print" src="images/bucket-logo.png" alt="">
                            </div>
                            <div class="invoice-info col-md-9 col-xs-10">

                                <div class="pull-right">
                                    <!-- <div class="col-md-6 col-sm-6 pull-left">
                                        <p>121 King Street, Melbourne <br>
                                            Victoria 3000 Australia</p>
                                    </div> -->
                                    <div class="col-md-12 col-sm-12 pull-left">
                                        <p>Phone: {{ $order->tel }} <br>
                                            Email : {{ $order->email }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row invoice-to">
                            <div class="col-md-4 col-sm-4 pull-left">
                                <h4>Information:</h4>
                                <h2>{{ $order->firstname }}</h2>
                                <p style="margin-top:10px;">
                                    {{ $order->no }}
						            @if($order->building) {{ ' '.$order->building  }} @endif
						            @if($order->floor) {{ ' ชั้น'.$order->floor  }} @endif
						            @if($order->room) {{ ' ห้อง'.$order->room  }} @endif
						            @if($order->road) {{ ' ถนน'.$order->road  }} @endif
						            @if($order->soi) {{ ' ซอย'.$order->soi  }} @endif
						            @if($order->village) {{ ' '.$order->village  }} @endif
						            @if($order->moo) {{ ' '.$order->moo  }} @endif
						            @if($order->subdistrict) {{ ' '.$order->subdistrict }} @endif
						            @if($order->district) {{ ' '.$order->district  }} @endif
						            @if($order->province) {{ ' '.$order->province  }} @endif
						            @if($order->zipcode) {{ ' '.$order->zipcode  }} @endif
                                </p>
                            </div>
                            <div class="col-md-4 col-sm-5 pull-right">
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">Order #</div>
                                    <div class="col-md-8 col-sm-7">{{ $order->id }}</div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">Date #</div>
                                    <div class="col-md-8 col-sm-7">{{ $order->created_at->toFormattedDateString() }}</div>
                                </div>
                                


                            </div>
                        </div>
                        <table class="table table-invoice" >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Item Description</th>
                               
                                <th class="text-center">Quantity</th>
                                 <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $sum = 0; ?>
                            @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <h4>{{ Product::find($product->id)->name }}</h4>
                                </td>
                                <td class="text-center">{{ $product->qty }}</td>
                                <td class="text-center">{{ number_format($product->price) }}</td>
                                <td class="text-center">{{ number_format($product->qty * $product->price) }}</td>
                            </tr>
                            <?php $sum += $product->qty * $product->price; ?>
                           @endforeach

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-5 col-xs-4 payment-method">
                                <h4>Order Status</h4>
                                <select class="form-control" name="status">
                                	<option value="1" {{ $order->order_status == '1' ? 'selected' : '' }}>รอชำระเงิน</option>
                                	<option value="2" {{ $order->order_status == '2' ? 'selected' : '' }}>กำลังจัดส่งสินค้า</option>
                                	<option value="3" {{ $order->order_status == '3' ? 'selected' : '' }}>เรียบร้อย</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-xs-5 invoice-block pull-right">
                                <ul class="unstyled amounts">
                                    <!-- <li>Sub - Total amount : $3820</li>
                                    <li>Discount : 10% </li>
                                    <li>TAX (15%) ----- </li> -->
                                    <li class="grand-total">Grand Total : <?php echo number_format($sum); ?></li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-center invoice-btn">
                           
                            <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i> Edit </button>
                           <!--  <a href="invoice_print.html" target="_blank" class="btn btn-primary btn-lg"><i class="fa fa-print"></i> Print </a> -->
                        </div>

                    </div>
                </section>
            </div>
        </div>
{{ Form::close() }}