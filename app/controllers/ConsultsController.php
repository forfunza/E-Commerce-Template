<?php

class ConsultsController extends AdminController {

	/**
	 * Display a listing of consults
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
		
		$consults = Consult::all();

		$view = array(
			'consults' => $consults
			);

		return $this->theme->scope('consults.index', $view)->render();
	}

	/**
	 * Show the form for creating a new consult
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('consults.create')->render();
	}

	/**
	 * Store a newly created consult in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Consult::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$consult = Consult::create($data);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$consult->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('ConsultsController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Display the specified consult.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$consult = Consult::findOrFail($id);

		return View::make('consults.show', compact('consult'));
	}

	/**
	 * Show the form for editing the specified consult.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$consult = Consult::find($id);

		$view = array(
			'consult' => $consult
			);

		return $this->theme->scope('consults.edit', $view)->render();
	}

	/**
	 * Update the specified consult in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$consult = Consult::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Consult::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$consult->update([
			'name' => $data['name'],
			'highlight' => $data['highlight'],
			'description' => $data['description']
			]);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$consult->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('ConsultsController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Remove the specified consult from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Consult::destroy($id);

		return Redirect::action('ConsultsController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

}
