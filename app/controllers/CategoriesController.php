<?php

class CategoriesController extends AdminController {

	/**
	 * Display a listing of categories
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

		$entity = Entity::where('name',Input::get('entity'))->first();

		$categories = Category::where('entity_id',$entity->id)->get();

		$view = array(
			'categories' => $categories,
			'entity' => $entity
			);

		return $this->theme->scope('categories.index', $view)->render();
	}

	/**
	 * Show the form for creating a new category
	 *
	 * @return Response
	 */
	public function create()
	{
		$entity = Entity::where('name',Input::get('entity'))->first();
		$view = array(
			'entity' => $entity
			);
		return $this->theme->scope('categories.create',$view)->render();
	}

	/**
	 * Store a newly created category in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Category::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

	
		$category = Category::create([
				'entity_id' => $data['entity_id'],
				'name' => $data['name']
			]);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$category->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		$entity = Entity::find($data['entity_id']);

		return Redirect::action('CategoriesController@index','entity='.$entity->name)->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Display the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = Category::findOrFail($id);

		return View::make('categories.show', compact('category'));
	}

	/**
	 * Show the form for editing the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::find($id);

		$view = array(
			'category' => $category
			);

		return $this->theme->scope('categories.edit', $view)->render();
	}

	/**
	 * Update the specified category in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$category = Category::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Category::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}


		$category->update([
				'name' => $data['name']
			]);

		
		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);
			
			$category->update([
						'image' => asset('farms/images/'.$image.'')
					]);
			
		}

		

		$entity = Entity::find($category->entity_id);

		return Redirect::action('CategoriesController@index','entity='.$entity->name)->with('message', '<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Remove the specified category from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$category = Category::find($id);

		Category::destroy($id);

		$entity = Entity::find($category->entity_id);

		return Redirect::action('CategoriesController@index','entity='.$entity->name)->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

}
