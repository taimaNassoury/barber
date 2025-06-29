<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateBarber extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
        'time',
        'status',
        'day',
        'month',
        'name_customer',
        'phone',
        'check'
    ];

    public function emails()
    {
        return $this->hasMany(EmailTable::class, 'date_id');
    }
}
