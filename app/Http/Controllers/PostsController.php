<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $thread_id = $request->get('id');
        $posts = Post::where('thread_id', $thread_id)->get();
        return view('posts.index', compact('posts'));
    }

    public function create(Request $request)
    {
        return view('posts.create');
    }

    public function show(Request $request)
    {
        $post_id = $request->get('post');
        $post = Post::find($post_id);
        $replies = Reply::where('post_id', $post_id)->get();
        return view('posts.show', compact('post', 'replies'));
    }

    public function store(Request $request)
    {
        // Проверка данных формы на ошибки
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'thread_id' => 'required',
            'image_path' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Сохраняем изображение в хранилище приложения
        $imagePath = $request->file('image_path')->store('posts', 'public');

        $post = Post::create([
            'user_id' => auth()->id(),
            'thread_id' => request('thread_id'),
            'title' => $request->title,
            'body' => $request->body,
            'image_path' => $imagePath,
            'comment_count' => intval($request->comment_count)
        ]);

        return redirect( $post->path($post['thread_id']));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $sql = "DELETE FROM posts WHERE `posts`.`id` = {$id}";
        DB::statement($sql);
        return redirect('/');
    }
}
