<?php

class ServicesController extends AdminController {

	/**
	 * Display a listing of services
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

		$services = Service::all();

		$view = array(
			'services' => $services
			);

		return $this->theme->scope('services.index', $view)->render();
	}

	/**
	 * Show the form for creating a new service
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::where('entity_id',1)->get();

		$view = array(
			'categories' => $categories
			);


		return $this->theme->scope('services.create', $view)->render();
	}

	/**
	 * Store a newly created service in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Service::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		

		Service::create(array(
					'image' => asset('farms/images/services/'.$image.''),
					'name' => $data['name'],
					'highlight' => $data['highlight'],
					'description' => $data['description'],
					'category_id' => $data['category_id']
				));

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/services/'.$image);

			Service::update(
				array(
						'image' => asset('farms/images/services/'.$image.'')
					)
				);
			
		}



		return Redirect::action('ServicesController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Display the specified service.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$service = Service::findOrFail($id);

		return View::make('services.show', compact('service'));
	}

	/**
	 * Show the form for editing the specified service.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$service = Service::find($id);
		$categories = Category::where('entity_id',1)->get();

		$view = array(
			'categories' => $categories,
			'service' => $service
			);

		return $this->theme->scope('services.edit', $view)->render();
	}

	/**
	 * Update the specified service in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$service = Service::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Service::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}



		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/services/'.$image);
			$service->update(array(
				'image' => asset('farms/images/services/'.$image.'')
				));
			
		}

		$service->update(array(
					'name' => $data['name'],
					'highlight' => $data['highlight'],
					'description' => $data['description'],
					'category_id' => $data['category_id']
				));

		

		return Redirect::action('ServicesController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Remove the specified service from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Service::destroy($id);

		return Redirect::action('ServicesController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

}
