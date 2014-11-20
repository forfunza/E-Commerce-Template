<?php

class ProductsController extends AdminController {

	/**
	 * Display a listing of products
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

		$products = Product::all();

		$view = array(
			'products' => $products
			);

		return $this->theme->scope('products.index', $view)->render();
	}

	/**
	 * Show the form for creating a new product
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::where('entity_id',2)->get();

		$view = array(
			'categories' => $categories
			);
		return $this->theme->scope('products.create', $view)->render();
	}

	/**
	 * Store a newly created product in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Product::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$product = Product::create(array(
					'code' => $data['code'],
					'name' => $data['name'],
					'highlight' => $data['highlight'],
					'description' => $data['description'],
					'category_id' => $data['category_id'],
					'stock' => $data['stock'],
					'best_sell' => isset($data['best_sell']) ?  $data['best_sell'] : '0'
				));


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
			$orig->save('farms/images/products/'.$image);

			$product->update([
					'images' => asset('farms/images/products/'.$image),
				]);
			
		}

		if(Input::hasFile('image_add')){
			
			foreach ($data['image_add'] as $key => $img) {
				
				$dt = new DateTime;
				$image = $dt->getTimestamp().'-'. sha1($img->getClientOriginalName()).'.'.$img->getClientOriginalExtension();
				$orig = Image::make($img->getRealPath());
				$height = $orig->height();
				if($height > 800){
					$orig->resize(null, 800, function ($constraint) {
					    $constraint->aspectRatio();
					});
				}
				$orig->save('farms/images/products/'.$image);
				ProductImage::create([
					'images' => asset('farms/images/products/'.$image),
					'product_id' => $product->id
					]);
				
			}
			
		}

		

		return Redirect::action('ProductsController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Display the specified product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);

		return View::make('products.show', compact('product'));
	}

	/**
	 * Show the form for editing the specified product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);
		$categories = Category::where('entity_id',2)->get();

		$view = array(
			'categories' => $categories,
			'product' => $product
			);

		return $this->theme->scope('products.edit', $view)->render();
	}

	/**
	 * Update the specified product in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product = Product::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Product::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}


		$product->update(array(
					'code' => $data['code'],
					'name' => $data['name'],
					'highlight' => $data['highlight'],
					'description' => $data['description'],
					'category_id' => $data['category_id'],
					'stock' => $data['stock'],
					'best_sell' => $data['best_sell'] ?  $data['best_sell'] : '0'
				));

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/products/'.$image);

			$product->update(
				array(
						'image' => asset('farms/images/products/'.$image.'')
					)
				);
			
		}

		if(Input::hasFile('image_add')){

			ProductImage::where('product_id', $product->id)->delete();
			
			foreach ($data['image_add'] as $key => $img) {
				
				$dt = new DateTime;
				$image = $dt->getTimestamp().'-'. sha1($img->getClientOriginalName()).'.'.$img->getClientOriginalExtension();
				$orig = Image::make($img->getRealPath());
				$height = $orig->height();
				if($height > 800){
					$orig->resize(null, 800, function ($constraint) {
					    $constraint->aspectRatio();
					});
				}
				$orig->save('farms/images/products/'.$image);
				ProductImage::create([
					'images' => asset('farms/images/products/'.$image),
					'product_id' => $product->id
					]);
				
			}
			
		}

		return Redirect::action('ProductsController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

	/**
	 * Remove the specified product from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Product::destroy($id);

		return Redirect::action('ProductsController@index')->with('message', '<strong>Success!</strong> Your content has been modified.');

	}

}
