<?php

class BeforesController extends AdminController {

	/**
	 * Display a listing of befores
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
		
		$befores = Before::all();

		$view = array(
			'befores' => $befores
			);

		return $this->theme->scope('befores.index', $view)->render();
	}

	/**
	 * Show the form for creating a new before
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('befores.create')->render();
	}

	/**
	 * Store a newly created before in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Before::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$before = Before::create([
				'name' => $data['name'],
				'author' => $data['author'],
				'description' => $data['description']
			]);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$before->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('BeforesController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Display the specified before.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$before = Before::findOrFail($id);

		return View::make('befores.show', compact('before'));
	}

	/**
	 * Show the form for editing the specified before.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$before = Before::find($id);

		$view = array(
			'before' => $before
			);

		return $this->theme->scope('befores.edit', $view)->render();
	}

	/**
	 * Update the specified before in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$before = Before::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Before::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$before->update([
			'name' => $data['name'],
			'author' => $data['author'],
			'description' => $data['description']
			]);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$before->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('BeforesController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Remove the specified before from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Before::destroy($id);

		return Redirect::action('BeforesController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

}
