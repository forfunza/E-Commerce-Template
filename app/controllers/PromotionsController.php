<?php

class PromotionsController extends AdminController {

	/**
	 * Display a listing of promotions
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
		
		$promotions = Promotion::all();
		
		$view = array(
			'promotions' => $promotions
			);

		return $this->theme->scope('promotions.index', $view)->render();
	}

	/**
	 * Show the form for creating a new promotion
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('promotions.create')->render();
	}

	/**
	 * Store a newly created promotion in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$validator = Validator::make($data = Input::all(), Promotion::$rules);
		//dd($data);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$promotion = Promotion::create($data);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$promotion->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('PromotionsController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Display the specified promotion.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$promotion = Promotion::findOrFail($id);

		return View::make('promotions.show', compact('promotion'));
	}

	/**
	 * Show the form for editing the specified promotion.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$promotion = Promotion::find($id);

		$view = array(
			'promotion' => $promotion
			);

		return $this->theme->scope('promotions.edit', $view)->render();
	}

	/**
	 * Update the specified promotion in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$promotion = Promotion::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Promotion::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$promotion->update($data);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$promotion->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('PromotionsController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Remove the specified promotion from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Promotion::destroy($id);

		return Redirect::action('PromotionsController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

}
