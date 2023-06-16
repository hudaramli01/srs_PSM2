<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'id',
        'productName',
        'productDesc',
        'quantity',
        'price',
        'picture',
        'status',
    ];
}
