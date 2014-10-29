<?php

class Bather extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'expire' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['image','name','tel','description','dealer','dealer_price','amed_price','expire'];

}