<?php

class ReviewsController extends AdminController {

	/**
	 * Display a listing of reviews
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
		
		$reviews = Review::all();

		$view = array(
			'reviews' => $reviews
			);

		return $this->theme->scope('reviews.index', $view)->render();
	}

	/**
	 * Show the form for creating a new review
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('reviews.create')->render();
	}

	/**
	 * Store a newly created review in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Review::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$review = Review::create($data);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$review->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('ReviewsController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	
	}

	/**
	 * Display the specified review.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$review = Review::findOrFail($id);

		return View::make('reviews.show', compact('review'));
	}

	/**
	 * Show the form for editing the specified review.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$review = Review::find($id);

		$view = array(
			'review' => $review
			);

		return $this->theme->scope('reviews.edit', $view)->render();
	}

	/**
	 * Update the specified review in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$review = Review::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Review::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$review->update($data);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$review->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('ReviewsController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Remove the specified review from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Review::destroy($id);

		return Redirect::action('ReviewsController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

}
