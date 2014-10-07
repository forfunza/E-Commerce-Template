<?php

class NewsController extends \AdminController {

	/**
	 * Display a listing of news
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
		
		$news = News::all();

		$view = array(
			'news' => $news
			);

		return $this->theme->scope('news.index', $view)->render();
	}

	/**
	 * Show the form for creating a new news
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('news.create')->render();
	}

	/**
	 * Store a newly created news in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), News::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$news = News::create($data);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$news->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('NewsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Display the specified news.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$news = News::findOrFail($id);

		return $this->theme->scope('news.show', $news)->render();
	}

	/**
	 * Show the form for editing the specified news.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$news = News::find($id);

		$view = array(
			'news' => $news
			);
		
		return $this->theme->scope('news.edit', $view)->render();
	}

	/**
	 * Update the specified news in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$news = News::findOrFail($id);

		$validator = Validator::make($data = Input::all(), News::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$news->update($data);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$news->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('NewsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Remove the specified news from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		News::destroy($id);

		return Redirect::action('NewsController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

}
