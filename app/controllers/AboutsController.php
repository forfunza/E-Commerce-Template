<?php

class AboutsController extends AdminController {

	/**
	 * Display a listing of abouts
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

		$abouts = About::all();

		$view = array(
			'abouts' => $abouts
			);

		return $this->theme->scope('abouts.index', $view)->render();
	}

	/**
	 * Show the form for creating a new about
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('abouts.create', $view)->render();
	}

	/**
	 * Store a newly created about in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), About::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		About::create($data);

		return Redirect::route('abouts.index');
	}

	/**
	 * Display the specified about.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$about = About::findOrFail($id);

		return View::make('abouts.show', compact('about'));
	}

	/**
	 * Show the form for editing the specified about.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$about = About::find($id);

		$view = array(
			'about' => $about
			);

		return $this->theme->scope('abouts.edit', $view)->render();
	}

	/**
	 * Update the specified about in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$about = About::findOrFail($id);

		$validator = Validator::make($data = Input::all(), About::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$about->update($data);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$about->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('AboutsController@edit',1)->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Remove the specified about from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		About::destroy($id);

		return Redirect::route('abouts.index');
	}

}
