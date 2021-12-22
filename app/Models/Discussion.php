<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    public function best_Reply()
    {
        return $this->belongsTo(Reply::class, "bestReply");
    }
    public function watchers()
    {
        return $this->hasMany(Watcher::class);
    }
    public function is_watcher()
    {
        $id = Auth::id();
        $watchers = array();
        foreach ($this->watchers as $watcher) :
            array_push($watchers, $watcher->user_id);
        endforeach;

        if (in_array($id, $watchers)) {
            return true;
        } else {
            return false;
        }
    }
    public function is_Open()
    {
        $result = false;

        foreach ($this->replies as $reply) {
            if ($reply->best_reply) {
                $result = true;
                break;
            }
        }
        // dd($result);
        return $result;
    }
}
