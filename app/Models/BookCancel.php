<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCancel extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name','last_name','email','date','time','code','phone','service_name','who_delete'
    ];

}
