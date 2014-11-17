<?php

class ServiceDiscountsController extends \AdminController {

	/**
	 * Display a listing of ServiceDiscounts
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

		$ServiceDiscounts = ServiceDiscount::all();

		$view = array(
			'ServiceDiscounts' => $ServiceDiscounts
			);

		return $this->theme->scope('service_discounts.index', $view)->render();
	}

	/**
	 * Show the form for creating a new ServiceDiscount
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('service_discounts.create')->render();
	}

	/**
	 * Store a newly created ServiceDiscount in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), ServiceDiscount::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		ServiceDiscount::create($data);

		return Redirect::action('ServiceDiscountsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Display the specified ServiceDiscount.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ServiceDiscount = ServiceDiscount::findOrFail($id);

		$view = array(
			'ServiceDiscount' => $ServiceDiscount
			);

		return $this->theme->scope('service_discounts.show', $view)->render();
	}

	/**
	 * Show the form for editing the specified ServiceDiscount.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ServiceDiscount = ServiceDiscount::find($id);

		$view = array(
			'ServiceDiscount' => $ServiceDiscount
			);
		
		return $this->theme->scope('service_discounts.edit', $view)->render();
	}

	/**
	 * Update the specified ServiceDiscount in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$ServiceDiscount = ServiceDiscount::findOrFail($id);

		$validator = Validator::make($data = Input::all(), ServiceDiscount::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$ServiceDiscount->update($data);

		return Redirect::action('ServiceDiscountsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Remove the specified ServiceDiscount from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		ServiceDiscount::destroy($id);

		return Redirect::action('ServiceDiscountsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

}
