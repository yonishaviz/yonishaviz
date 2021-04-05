<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderrs extends Model
{
    protected $fillable = ['user_id',
    'billing_email',
'billing_name',
'billing_discount',
'billing_discount_conde',
'billing_subtotal',
'billing_tax',
'billing_total',
'shipped',
'erorr',];
public function user()
{
	return $this->belongsTo('App\User');
}
public function products()
{
return $this->belongsToMany('App\product','order_product','order_id')->withPivot('quantity');
}
}