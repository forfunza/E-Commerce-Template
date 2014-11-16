<?php

class PromotionOrdersController extends \AdminController {

	/**
	 * Display a listing of promotionorders
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


		$promotionorders = Promotionorder::all();

		$view = array(
			'promotionorders' => $promotionorders
			);

		return $this->theme->scope('promotion_orders.index', $view)->render();
	}

	/**
	 * Show the form for creating a new promotionorder
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('promotion_orders.create')->render();
	}

	/**
	 * Store a newly created promotionorder in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Promotionorder::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Promotionorder::create($data);

		return Redirect::action('PromotionOrdersController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Display the specified promotionorder.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$promotionorder = Promotionorder::findOrFail($id);

		return $this->theme->scope('promotion_orders.show', $promotionorders)->render();
	}

	/**
	 * Show the form for editing the specified promotionorder.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$promotionorder = Promotionorder::find($id);

		$view = array(
			'promotionorder' => $promotionorder
			);
		
		return $this->theme->scope('promotion_orders.edit', $view)->render();
	}

	/**
	 * Update the specified promotionorder in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$promotionorder = Promotionorder::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Promotionorder::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$promotionorder->update([
			'order_status' => $data['status']
			]);

		return Redirect::action('PromotionOrdersController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Remove the specified promotionorder from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Promotionorder::destroy($id);

		return Redirect::action('PromotionOrdersController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

}
