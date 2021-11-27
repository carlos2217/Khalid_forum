<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'discription',
        'content',
        'category_id',
        'post_image',
        'slug',
    ];
    // 
    public function getRouteKeyName()
    {
        return 'slug';
    }
    // 
    public function check($id)
    {
        return in_array($id, $this->tags->pluck('id')->toArray());
    }
    // scope
    public function scopeMyposts($query)
    {
        // return $query->withTrashed()->where('user_id', Auth()->user()->id);
        return $query->where('user_id', Auth()->user()->id)->get();
    }
    // 
    public function auther()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
