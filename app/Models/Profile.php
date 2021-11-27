<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'about',
        'gravater',
        'facebook',
        'youtube',
    ];
    // 
    public function getRouteKeyName()
    {
        return "user_id";
    }
    // 
    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
