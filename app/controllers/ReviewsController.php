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

		
		$review->update([
				'name' => $data['name'],
				'highlight' => $data['highlight'],
				'description' => $data['description'],
				'youtube' => $data['youtube'],
				'url' => $data['url'],
				'tel' => $data['tel'],
				'facebook' => $data['facebook'],
				'line' => $data['line'],
				'website' => $data['website'],
				'instagram' => $data['instagram'],

			]);

		if(Input::has('home')){
			$old = Review::where('home',1)->first();

			if($old->id != $review->id){
				$old = Review::where('home',1)->update([
						'home' => 0
					]);
			}

			
			$review->update([
				'home' => 1
			]);
			
		}


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
