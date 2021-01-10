<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'seller_id',
        'upc_product_code',
        'seller_orignal_quantity',
        'seller_remaining_quantity',
        'seller_catelog_id',
        'seller_listed_price',
        'seller_deal_price',
        'seller_negotiation_mode',
        'seller_lowest_deal_price',
        'expiry_date'
    ];
}
