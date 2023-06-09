<?php

namespace App\Models;

use App\Filters\ThreadFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $guarded = [];

    /* Активная загрузка (eager loading)  */

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::addGlobalScope('replyCount', function ($builder) {
//            $builder->withCount('replies');
//        });
//
//        static::deleting(function ($thread) {
//            $thread->replies()->delete();
//        });
//    }

    public function path()
    {
        return "{$this->slug}?id={$this->id}";
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }

    public function scopeFilter($query, ThreadFilters $filters)
    {
        return $filters->apply($query);
    }

}
