<?php

class CelebritiesController extends AdminController {

	/**
	 * Display a listing of celebrities
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
		
		$celebrities = Celebrity::all();

		$view = array(
			'celebrities' => $celebrities
			);

		return $this->theme->scope('celebrities.index', $view)->render();
	}

	/**
	 * Show the form for creating a new celebrity
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('celebrities.create')->render();
	}

	/**
	 * Store a newly created celebrity in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Celebrity::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			Celebrity::create(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('CelebritiesController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Display the specified celebrity.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$celebrity = Celebrity::findOrFail($id);

		return View::make('celebrities.show', compact('celebrity'));
	}

	/**
	 * Show the form for editing the specified celebrity.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$celebrity = Celebrity::find($id);

		$view = array(
			'celebrity' => $celebrity
			);

		return $this->theme->scope('celebrities.edit', $view)->render();
	}

	/**
	 * Update the specified celebrity in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$celebrity = Celebrity::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Celebrity::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$celebrity->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('CelebritiesController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Remove the specified celebrity from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Celebrity::destroy($id);

		return Redirect::action('CelebritiesController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

}
