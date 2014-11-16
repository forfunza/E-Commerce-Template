<?php

class ServiceDiscountsController extends \AdminController {

	/**
	 * Display a listing of servicediscounts
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

		$servicediscounts = Servicediscount::all();

		$view = array(
			'servicediscounts' => $servicediscounts
			);

		return $this->theme->scope('service_discounts.index', $view)->render();
	}

	/**
	 * Show the form for creating a new servicediscount
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('service_discounts.create')->render();
	}

	/**
	 * Store a newly created servicediscount in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Servicediscount::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Servicediscount::create($data);

		return Redirect::action('ServiceDiscountsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Display the specified servicediscount.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$servicediscount = Servicediscount::findOrFail($id);

		$view = array(
			'servicediscount' => $servicediscount
			);

		return $this->theme->scope('service_discounts.show', $view)->render();
	}

	/**
	 * Show the form for editing the specified servicediscount.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$servicediscount = Servicediscount::find($id);

		$view = array(
			'servicediscount' => $servicediscount
			);
		
		return $this->theme->scope('service_discounts.edit', $view)->render();
	}

	/**
	 * Update the specified servicediscount in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$servicediscount = Servicediscount::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Servicediscount::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$servicediscount->update($data);

		return Redirect::action('ServiceDiscountsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Remove the specified servicediscount from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Servicediscount::destroy($id);

		return Redirect::action('ServiceDiscountsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

}
