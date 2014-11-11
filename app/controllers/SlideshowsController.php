<?php

class SlideshowsController extends \AdminController {

	/**
	 * Display a listing of slideshows
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
		
		$slideshows = Slideshow::all();

		$view = array(
			'slideshows' => $slideshows
			);

		return $this->theme->scope('slideshows.index', $view)->render();
	}

	/**
	 * Show the form for creating a new slideshow
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('slideshows.create')->render();
	}

	/**
	 * Store a newly created slideshow in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Slideshow::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$slide = Slideshow::create([
					'link' => $data['link']
				]);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			$orig = Image::make(Input::file('image')->getRealPath());
			$height = $orig->height();
			if($height > 900){
				$orig->resize(null, 900, function ($constraint) {
				    $constraint->aspectRatio();
				});
			}
			$orig->save('farms/images/'.$image);

			$slide->update([
					'image' => asset('farms/images/'.$image),
				]);
			
		}

		

		return Redirect::action('SlideshowsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Display the specified slideshow.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$slideshow = Slideshow::findOrFail($id);

		return $this->theme->scope('slideshows.show', $slideshows)->render();
	}

	/**
	 * Show the form for editing the specified slideshow.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$slideshow = Slideshow::find($id);

		$view = array(
			'slideshow' => $slideshow
			);
		
		return $this->theme->scope('slideshows.edit', $view)->render();
	}

	/**
	 * Update the specified slideshow in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$slideshow = Slideshow::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Slideshow::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$slideshow->update([
				'link' => $data['link']
			]);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			$orig = Image::make(Input::file('image')->getRealPath());
			$height = $orig->height();
			if($height > 900){
				$orig->resize(null, 900, function ($constraint) {
				    $constraint->aspectRatio();
				});
			}
			$orig->save('farms/images/'.$image);

			$slideshow->update([
					'image' => asset('farms/images/'.$image),
				]);
			
		}

		return Redirect::action('SlideshowsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Remove the specified slideshow from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Slideshow::destroy($id);

		return Redirect::action('SlideshowsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

}
