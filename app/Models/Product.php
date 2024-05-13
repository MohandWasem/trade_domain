<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name','product_arabic_name','product_description','product_arabic_description'
        ,'category_id','part_number','hs_code',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    protected $appends = ['serial_product'];

    public function getSerialProductAttribute()
    {
        return $Serial_Product= ('PC'.'-'. + $this->id);

    }
}
