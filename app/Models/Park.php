<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    use HasFactory;

    protected $fillable = [
       'park_code',
       'user_id',
       'policy_number',
       'enter_time',
       'exit_time',
       'price'
    ];

    public function histories()
    {
        return $this->hasMany(ParkHistory::class);
    }
}
