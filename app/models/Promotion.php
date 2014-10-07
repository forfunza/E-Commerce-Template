<?php

class Promotion extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'expire' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['image','name','description','expire','price','seller'];

}