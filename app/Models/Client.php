<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name','contact_person','email','telephone',
        'mobile','address','tax_id','notes',
    ];



    protected $appends = ['serial_client'];

    public function getSerialClientAttribute()
    {
        return $Serial_Client= ('CL'.'-'. + $this->id);

    }
}
