<?php

class OrdersController extends \AdminController {

	/**
	 * Display a listing of orders
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

		$orders = Order::all();

		$view = array(
			'orders' => $orders
			);

		return $this->theme->scope('orders.index', $view)->render();
	}

	/**
	 * Show the form for creating a new order
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('orders.create')->render();
	}

	/**
	 * Store a newly created order in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Order::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Order::create($data);

		return Redirect::action('OrdersController@index')->with('message','');
	}

	/**
	 * Display the specified order.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::findOrFail($id);

		return $this->theme->scope('orders.show', $orders)->render();
	}

	/**
	 * Show the form for editing the specified order.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = Order::find($id);
		$products = OrderProduct::where('order_id',$id)->get();
		$view = array(
			'order' => $order,
			'products' => $products
			);
		
		return $this->theme->scope('orders.edit', $view)->render();
	}

	/**
	 * Update the specified order in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$order = Order::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Order::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$order->update([
				'order_status' => $data['status']
			]);

		return Redirect::action('OrdersController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Remove the specified order from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Order::destroy($id);

		return Redirect::action('OrdersController@index')->with('message','');
	}

}
