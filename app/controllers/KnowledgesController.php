<?php

class KnowledgesController extends AdminController {

	/**
	 * Display a listing of knowledges
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
		
		$knowledges = Knowledge::all();

		$view = array(
			'knowledges' => $knowledges
			);

		return $this->theme->scope('knowledges.index', $view)->render();
	}

	/**
	 * Show the form for creating a new knowledge
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('knowledges.create')->render();
	}

	/**
	 * Store a newly created knowledge in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Knowledge::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$knowledge = Knowledge::create($data);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$knowledge->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('KnowledgesController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Display the specified knowledge.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$knowledge = Knowledge::findOrFail($id);

		return View::make('knowledges.show', compact('knowledge'));
	}

	/**
	 * Show the form for editing the specified knowledge.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$knowledge = Knowledge::find($id);

		$view = array(
			'knowledge' => $knowledge
			);

		return $this->theme->scope('knowledges.edit',$view)->render();
	}

	/**
	 * Update the specified knowledge in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$knowledge = Knowledge::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Knowledge::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$knowledge->update($data);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$knowledge->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('KnowledgesController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Remove the specified knowledge from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Knowledge::destroy($id);

		return Redirect::action('KnowledgesController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

}
