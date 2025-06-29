<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'date_id',
        'time',
        'code',
        'phone',
        'service_name',
        'type'
    ];

    public function dateBarber()
    {
        return $this->belongsTo(DateBarber::class, 'date_id');
    }
}
