<?php

class Review extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['image','highlight','name','description','youtube','url','tel','facebook','line','website','instagram','home'];

}