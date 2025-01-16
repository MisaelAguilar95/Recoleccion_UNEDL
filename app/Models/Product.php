<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     use HasFactory;

    protected $fillable = [
        'user_id',
        'modify_user_id',
        'title',
        'product_code',
        'description',
        'priceXkilo'
    ];

    public function separations()
    {
        return $this->hasMany(Separation::class);
    }
}
