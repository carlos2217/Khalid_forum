<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'discussion_id', 'content'];
    public function auther()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function in_like()
    {
        $id = Auth::id();

        $likes = array();

        foreach ($this->likes as $like) :
            array_push($likes, $like->user_id);
        endforeach;

        if (in_array($id, $likes)) {
            return true;
        } else {
            return false;
        }
    }
}
