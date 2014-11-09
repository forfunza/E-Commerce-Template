<?php

class Product extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['image','code','price','name','highlight','description','best_sell','stock','category_id'];

	public function category()
    {
        return $this->belongsTo('Category');
    }

}