<?php

class ContactsController extends \AdminController {


	public function edit($id)
	{
		$contact = Contact::find($id);

		$view = array(
			'contact' => $contact
			);
		
		return $this->theme->scope('contacts.edit', $view)->render();
	}

	/**
	 * Update the specified news in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$contact = Contact::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Contact::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$contact->update($data);

		if(Input::hasFile('image')){
			
			$dt = new DateTime;
			$image = $dt->getTimestamp().'.'.Input::file('image')->getClientOriginalExtension();
			Image::make(Input::file('image')->getRealPath())->save('farms/images/'.$image);

			$contact->update(
				array(
						'image' => asset('farms/images/'.$image.'')
					)
				);
			
		}

		return Redirect::action('ContactsController@edit',1)->with('message','<strong>Success!</strong> Your content has been modified.');
	}


}
