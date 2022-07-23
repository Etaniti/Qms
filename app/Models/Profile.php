<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
