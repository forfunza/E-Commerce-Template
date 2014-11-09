<?php

class BathersController extends \AdminController {

	/**
	 * Display a listing of bathers
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
		
		$bathers = Bather::all();

		$view = array(
			'bathers' => $bathers
			);

		return $this->theme->scope('bathers.index', $view)->render();
	}

	/**
	 * Show the form for creating a new bather
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('bathers.create')->render();
	}

	/**
	 * Store a newly created bather in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Bather::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$bather = Bather::create(array(
					'name' => $data['name'],
					'dealer' => $data['dealer'],
					'tel' => $data['tel'],
					'description' => $data['description'],
					'dealer_price' => $data['dealer_price'],
					'amed_price' => $data['amed_price'],
					'expire' => strtotime($data['expire'])
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
			$orig->save('farms/images/'.$image);

			$bather->update([
					'image' => asset('farms/images/'.$image),
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
				$orig->save('farms/images/'.$image);
				BatherImage::create([
					'images' => asset('farms/images/'.$image),
					'bather_id' => $bather->id
					]);
				
			}
		}
			

		return Redirect::action('BathersController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Display the specified bather.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bather = Bather::findOrFail($id);

		return $this->theme->scope('bathers.show', $bathers)->render();
	}

	/**
	 * Show the form for editing the specified bather.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bather = Bather::find($id);

		$view = array(
			'bather' => $bather
			);
		
		return $this->theme->scope('bathers.edit', $view)->render();
	}

	/**
	 * Update the specified bather in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$bather = Bather::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Bather::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		

		$bather->update([
					'name' => $data['name'],
					'dealer' => $data['dealer'],
					'tel' => $data['tel'],
					'description' => $data['description'],
					'dealer_price' => $data['dealer_price'],
					'amed_price' => $data['amed_price'],
					'expire' => $data['expire']
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

			$bather->update([
					'image' => asset('farms/images/'.$image),
				]);
			
		}

		if(Input::hasFile('image_add')){

			BatherImage::where('bather_id', $bather->id)->delete();
			
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
				$orig->save('farms/images/'.$image);
				BatherImage::create([
					'images' => asset('farms/images/'.$image),
					'bather_id' => $bather->id
					]);
				
			}
		}

		return Redirect::action('BathersController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	/**
	 * Remove the specified bather from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Bather::destroy($id);

		return Redirect::action('BathersController@index')->with('message','<strong>Success!</strong> Your content has been modified.');
	}

}
