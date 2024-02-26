<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','image','slug','is_active'];

    protected $table = "products";

    public function articles() {
        return $this->hasMany('App\Models\product_prices');
    }
}
