<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];
    protected $table = 'carts';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function getNameAttribute(){
        return $this->product->name;
    }
    public function getPriceAttribute()
    {
        return $this->product->price;
    }
    public function getImagesAttribute()
    {
        return $this->product->images;
    }
    public function getDiscountTypeAttribute()
    {
        return $this->product->discount_type;
    }
    public function getDiscountValueAttribute()
    {
        return $this->product->discount_value;
    }
}
