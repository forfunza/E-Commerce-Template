{{ Form::open(array('action' => array('PromotionOrdersController@update',$promotionorder->id), 'method' => 'put', 'class' => 'form-horizontal bucket-form')) }}
	<section class="panel">
		<header class="panel-heading">
			Promotion Order Information
			<div class="pull-right">
				<button type="submit" class="btn btn-primary">Edit</button>
			</div>
			<div class="clearfix"></div>
		</header>
		<div class="panel-body">


            <div class="form-group">
				<label class="col-sm-2 control-label">Promotion name</label>
				<div class="col-sm-10">
					<label class="col-sm-10 control-label" style="text-align:left;">{{ Promotion::find($promotionorder->id)->name }}</label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Promotion Price</label>
				<div class="col-sm-10">
					<label class="col-sm-10 control-label" style="text-align:left;">{{ number_format(Promotion::find($promotionorder->id)->price) }}</label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Order ID</label>
				<div class="col-sm-10">
					<label class="col-sm-10 control-label" style="text-align:left;">{{ $promotionorder->invoice_id}}</label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Customer Name</label>
				<div class="col-sm-10">
					<label class="col-sm-10 control-label" style="text-align:left;">{{ $promotionorder->firstname.' '.$promotionorder->lastname }}</label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tel</label>
				<div class="col-sm-10">
					<label class="col-sm-10 control-label" style="text-align:left;">{{ $promotionorder->tel }}</label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<label class="col-sm-10 control-label" style="text-align:left;">{{ $promotionorder->email }}</label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Address</label>
				<div class="col-sm-10">
					<label class="col-sm-10 control-label" style="text-align:left;">{{ $promotionorder->address }}</label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-4">
					<select class="form-control" name="status">
                    	<option value="1" {{ $promotionorder->order_status == '1' ? 'selected' : '' }}>รอชำระเงิน</option>
                    	<option value="2" {{ $promotionorder->order_status == '2' ? 'selected' : '' }}>ดำเนินการ</option>
                    	<option value="3" {{ $promotionorder->order_status == '3' ? 'selected' : '' }}>เรียบร้อย</option>
                    </select>
				</div>
			</div>

			
			
			
           
         
			
			
		
		</div>
	</section>
{{ Form::close() }}