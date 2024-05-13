<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name'
    ];


    protected $appends = ['serial_category'];

    public function getSerialCategoryAttribute()
    {
        return $Serial_Category= ('CA'.'-'. + $this->id);

    }
}
