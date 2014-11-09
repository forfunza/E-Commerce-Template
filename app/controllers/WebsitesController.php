<?php

class WebsitesController extends \AdminController {

	
	public function edit($id)
	{
		$website = Website::find($id);

		$view = array(
			'website' => $website
			);
		
		return $this->theme->scope('websites.edit', $view)->render();
	}

	/**
	 * Update the specified website in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$website = Website::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Website::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$website->update([
			'callcenter' => $data['callcenter'],
			'facebook' => $data['facebook'],
			'instagram' => $data['instagram'],
			'socialcam' => $data['socialcam'],
			'youtube' => $data['youtube']
			]);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$website->update([
					'image' => asset('farms/images/'.$image.'')
				]);
			
		}
		return Redirect::action('WebsitesController@edit',1)->with('message','<strong>Success!</strong> Your content has been modified.');
	}

	

}
