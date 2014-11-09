<?php

class OrderProduct extends \Eloquent {
	protected $fillable = ['order_id','product_id','price','qty','total'];
}