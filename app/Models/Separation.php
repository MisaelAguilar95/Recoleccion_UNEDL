<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;



class Separation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'weight',
        'num_bags',
        'm3',
        'qr_code',
        'status',
        'notes',
        'plantel',
        'img'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
