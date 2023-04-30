<?php

namespace App\Filters;

use App\Models\Post;
use App\Models\Thread;
use Illuminate\Database\Eloquent\Builder;

class PostFilters
{
   public function test()
   {
       $threads = Thread::all();

       $posts = Post::all();

       return $threads;
   }
}
