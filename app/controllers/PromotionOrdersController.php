<?php

class PromotionOrdersController extends \AdminController {

	/**
	 * Display a listing of PromotionOrders
	 *
	 * @return Response
	 */
	public function index()
	{

		$this->theme->asset()->container('inline-script')->writeScript('EditableTable', '
	    	jQuery(document).ready(function() {
	       		EditableTable.init();
	    	});
		');


		$PromotionOrders = PromotionOrder::all();

		$view = array(
			'PromotionOrders' => $PromotionOrders
			);

		return $this->theme->scope('promotion_orders.index', $view)->render();
	}

	/**
	 * Show the form for creating a new PromotionOrder
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('promotion_orders.create')->render();
	}

	/**
	 * Store a newly created PromotionOrder in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), PromotionOrder::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		PromotionOrder::create($data);

		return Redirect::action('PromotionOrdersController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Display the specified PromotionOrder.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$PromotionOrder = PromotionOrder::findOrFail($id);

		return $this->theme->scope('promotion_orders.show', $PromotionOrders)->render();
	}

	/**
	 * Show the form for editing the specified PromotionOrder.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$PromotionOrder = PromotionOrder::find($id);

		$view = array(
			'PromotionOrder' => $PromotionOrder
			);
		
		return $this->theme->scope('promotion_orders.edit', $view)->render();
	}

	/**
	 * Update the specified PromotionOrder in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$PromotionOrder = PromotionOrder::findOrFail($id);

		$validator = Validator::make($data = Input::all(), PromotionOrder::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$PromotionOrder->update([
			'order_status' => $data['status']
			]);

		return Redirect::action('PromotionOrdersController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Remove the specified PromotionOrder from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		PromotionOrder::destroy($id);

		return Redirect::action('PromotionOrdersController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

}
