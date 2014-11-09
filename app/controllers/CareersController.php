<?php

class CareersController extends \AdminController {

	/**
	 * Display a listing of careers
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
		
		$careers = Career::all();

		$view = array(
			'careers' => $careers
			);

		return $this->theme->scope('careers.index', $view)->render();
	}

	/**
	 * Show the form for creating a new career
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('careers.create')->render();
	}

	/**
	 * Store a newly created career in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Career::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Career::create($data);

		return Redirect::action('CareersController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Display the specified career.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$career = Career::findOrFail($id);

		return $this->theme->scope('careers.show', $careers)->render();
	}

	/**
	 * Show the form for editing the specified career.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$career = Career::find($id);

		$view = array(
			'career' => $career
			);
		
		return $this->theme->scope('careers.edit', $view)->render();
	}

	/**
	 * Update the specified career in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$career = Career::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Career::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$career->update($data);

		return Redirect::action('CareersController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Remove the specified career from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Career::destroy($id);

		return Redirect::action('CareersController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

}
