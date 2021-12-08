<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discussion extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id', 'bestReply', 'title', 'slug', 'description', 'content', 'discussion_image', 'channel_id'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // 
    public function scopeMydiscussions($query)
    {
        return $query->where('user_id', auth()->user()->id)->get();
    }
    // 
    public function auther()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
