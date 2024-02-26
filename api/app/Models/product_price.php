<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_price extends Model
{
    use HasFactory;

    protected $table = 'product_prices';

    protected $fillable = ['price','user_id','product_id'];

    public function product() {
        return $this->belongsTo('App\Models\Product');
    }

}
