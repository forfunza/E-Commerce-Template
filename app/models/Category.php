<?php

class Category extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['entity_id','name','image'];


	public function services()
    {
        return $this->hasMany('Service');
    }

    public function products()
    {
        return $this->hasMany('Product');
    }

}