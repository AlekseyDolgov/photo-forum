<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.comment')->only('store');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);

        $replies = Reply::create([
            'user_id' => auth()->id(),
            'body' => request('body'),
            'post_id' => request('post_id'),
            'thread_id' => request('thread_id')
        ]);

        return back();
    }
    public function destroy(Reply $reply)
    {
        $this->authorize('update', $reply);
        $reply->delete();
        return back();
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $sql = "DELETE FROM replies WHERE `replies`.`id` = {$id}";
        DB::statement($sql);
        return back();
    }
}
