<?php

class Order extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];
	protected $table = 'order';

	// Don't forget to fill this array
	protected $fillable = ['user_id','invoice_id','order_status','email','firstname','latsname','tel','building','room','floor','no','moo','mooban','soi','road','sub_district','district','province','postcode'];



}