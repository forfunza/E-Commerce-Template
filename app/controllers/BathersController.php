<?php

class BathersController extends \AdminController {

	/**
	 * Display a listing of bathers
	 *
	 * @return Response
	 */
	public function index()
	{
		$bathers = Bather::all();

		$view = array(
			'bathers' => $bathers
			);

		return $this->theme->scope('bathers.index', $view)->render();
	}

	/**
	 * Show the form for creating a new bather
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('bathers.create')->render();
	}

	/**
	 * Store a newly created bather in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Bather::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Bather::create($data);

		return Redirect::action('BathersController@index')->with('message','');
	}

	/**
	 * Display the specified bather.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bather = Bather::findOrFail($id);

		return $this->theme->scope('bathers.show', $bathers)->render();
	}

	/**
	 * Show the form for editing the specified bather.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bather = Bather::find($id);

		$view = array(
			'bather' => $bather
			);
		
		return $this->theme->scope('bathers.edit', $view)->render();
	}

	/**
	 * Update the specified bather in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$bather = Bather::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Bather::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$bather->update($data);

		return Redirect::action('BathersController@index')->with('message','');
	}

	/**
	 * Remove the specified bather from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Bather::destroy($id);

		return Redirect::action('BathersController@index')->with('message','');
	}

}
