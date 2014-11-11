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

		$contact->update([
			'name_1' => $data['name_1'],
			'name_2' => $data['name_2'],
			'address' => $data['address'],
			'tel' => $data['tel'],
			'fax' => $data['fax'],
			'email_1' => $data['email_1'],
			'email_2' => $data['email_2']
			]);

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
