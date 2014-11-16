<?php

class PromotionOrder extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['promotion_id','invoice_id','firstname','lastname','tel','email','address','order_status'];

}