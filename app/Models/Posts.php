<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'file_path', 'post_created_at', 'user_post_id', 'channel_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_post_id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPath()
    {
        return "/posts/{$this->channel->slug}/{$this->slug}";
    }
}

/*
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $with = ['channel'];
    protected $fillable = ['user_post_id', 'title', 'description', 'file_path', 'post_created_at', 'channel_id'];

    public function path()
    {
        return "/{$this->channel->slug}";
    }
}
*/
