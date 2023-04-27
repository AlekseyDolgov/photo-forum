<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    {
        return view('threads.posts.index');
    }

    public function create()
    {
        return view('threads.posts.create');
    }
/*
    public function store(Request $request)
    {
        // проверяет на ошибки
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            //'channel_id' => 'required|exists:channels,id',
            //'user_post_id' => 'required|exists:users,id',
            'posts' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Сохраняем изображение в хранилище приложения
        $imagePath = $request->file('posts')->store('posts', 'public');

        // добавляет в базу данных данные из формы
        $posts = Posts::create([
            'user_post_id' => auth()->id(),
            'channel_id' => request('channel_id'),
            'title' => request('title'),
            'description' => request('description'),
            'file_path' => $imagePath,
            'post_created_at' => now(),
        ]);

        return redirect($posts->path());
    }
*/
    public function store(Request $request)
    {
        // проверяет на ошибки
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            //'file_path' => 'required',
            //'channel_id' => 'required|exists:channels,id',
            //'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Сохраняем изображение в хранилище приложения
        $imagePath = $request->file('posts')->store('posts', 'public');

        // добавляет в базу данных данные из формы
        $post = Posts::create([
            'user_post_id' => auth()->id(),
            'channel_id' => request('channel_id'),
            'title' => request('title'),
            'description' => request('description'),
            'file_path' => $imagePath,
            'post_created_at' => now(),
        ]);

        $channel = $post->channel;
        return redirect($channel->path());
    }
}
