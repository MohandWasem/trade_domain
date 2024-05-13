<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name','contact_person','email','telephone',
        'mobile','address','tax_id','notes',
    ];



    protected $appends = ['serial_supplier'];

    public function getSerialSupplierAttribute()
    {
        return $Serial_Supplier= ('SL'.'-'. + $this->id);

    }
}
