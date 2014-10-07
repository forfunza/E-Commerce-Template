<?php

class BranchCareersController extends \AdminController {

	/**
	 * Display a listing of branchcareers
	 *
	 * @return Response
	 */
	public function index()
	{
		$branchcareers = Branchcareer::all();

		$view = array(
			'branchcareers' => $branchcareers
			);

		return $this->theme->scope('branchcareers.index', $view)->render();
	}

	/**
	 * Show the form for creating a new branchcareer
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('branchcareers.create')->render();
	}

	/**
	 * Store a newly created branchcareer in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Branchcareer::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Branchcareer::create($data);

		return Redirect::action('BranchCareersController@index')->with('message','');
	}

	/**
	 * Display the specified branchcareer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$branchcareer = Branchcareer::findOrFail($id);

		return $this->theme->scope('branchcareers.show', $branchcareers)->render();
	}

	/**
	 * Show the form for editing the specified branchcareer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$branchcareer = Branchcareer::find($id);

		$view = array(
			'branchcareer' => $branchcareer
			);
		
		return $this->theme->scope('branchcareers.edit', $view)->render();
	}

	/**
	 * Update the specified branchcareer in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$branchcareer = Branchcareer::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Branchcareer::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$branchcareer->update($data);

		return Redirect::action('BranchCareersController@index')->with('message','');
	}

	/**
	 * Remove the specified branchcareer from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Branchcareer::destroy($id);

		return Redirect::action('BranchCareersController@index')->with('message','');
	}

}
