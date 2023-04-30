<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $chanel_id = $request->get('channel');
        $posts = Post::where('channel_id', $chanel_id)->get();
        return view('posts.index', compact('posts'));
    }

    public function create(Request $request)
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Проверка данных формы на ошибки
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'channel_id' => 'required|exists:channels,id',
            'image_path' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Сохраняем изображение в хранилище приложения
        $imagePath = $request->file('image_path')->store('posts', 'public');

        $post = Post::create([
            'user_id' => auth()->id(),
            'channel_id' => request('channel_id'),
            'title' => $request->title,
            'body' => $request->body,
            'image_path' => $imagePath,
        ]);
        // Редирект на страницу нового поста
        return redirect($post->path($post['channel_id']));
    }
}
