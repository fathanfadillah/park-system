<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkHistory extends Model
{
    protected $fillable = [
        'park_id',
        'time',
        'status',
     ];

    use HasFactory;
}
