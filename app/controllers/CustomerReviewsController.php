<?php

class CustomerReviewsController extends \AdminController {

	/**
	 * Display a listing of customerreviews
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


		$customerreviews = Customerreview::all();

		$view = array(
			'customerreviews' => $customerreviews
			);

		return $this->theme->scope('customer_reviews.index', $view)->render();
	}

	/**
	 * Show the form for creating a new customerreview
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('customer_reviews.create')->render();
	}

	/**
	 * Store a newly created customerreview in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Customerreview::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$review =  Customerreview::create([
				'name' => $data['name'],
				'caption' => $data['caption']
			]);


		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			$orig = Image::make(Input::file('image')->getRealPath());
			$height = $orig->height();
			if($height > 800){
				$orig->resize(null, 800, function ($constraint) {
				    $constraint->aspectRatio();
				});
			}
			$orig->save('farms/images/'.$image);

			$review->update([
					'image' => asset('farms/images/'.$image),
				]);
			
		}

		return Redirect::action('CustomerReviewsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Display the specified customerreview.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$customerreview = Customerreview::findOrFail($id);

		return $this->theme->scope('customer_reviews.show', $customerreviews)->render();
	}

	/**
	 * Show the form for editing the specified customerreview.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$customerreview = Customerreview::find($id);

		$view = array(
			'customerreview' => $customerreview
			);
		
		return $this->theme->scope('customer_reviews.edit', $view)->render();
	}

	/**
	 * Update the specified customerreview in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$customerreview = Customerreview::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Customerreview::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$customerreview->update([
				'name' => $data['name'],
				'caption' => $data['caption']
			]);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			$orig = Image::make(Input::file('image')->getRealPath());
			$height = $orig->height();
			if($height > 800){
				$orig->resize(null, 800, function ($constraint) {
				    $constraint->aspectRatio();
				});
			}
			$orig->save('farms/images/'.$image);

			$customerreview->update([
					'image' => asset('farms/images/'.$image),
				]);
			
		}

		return Redirect::action('CustomerReviewsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Remove the specified customerreview from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Customerreview::destroy($id);

		return Redirect::action('CustomerReviewsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

}
