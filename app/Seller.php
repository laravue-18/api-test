<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Seller extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'email_id', 'contact_number', 'organization', 'industry', 'category', 'street_address', 'city', 'state', 'country', 'currency', 'zip'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
