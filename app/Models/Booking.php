<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
    'date_id','first_name','last_name','date','time','email','code','phone','service_name','service_price','service_currency'
    ];
}
