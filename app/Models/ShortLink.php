<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'url',
        'code',
        'name',
    ];

    // Optionally, define relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
