<?php

class Contact extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['image','name_1','name_2','address','tel','fax','email_1','email_2','email_3'];

}