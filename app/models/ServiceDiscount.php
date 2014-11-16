<?php

class ServiceDiscount extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['firstname','lastname','tel','email','address','problem','branch','contact'];

}