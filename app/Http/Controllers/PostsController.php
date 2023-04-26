<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        // проверяет на ошибки
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            //'channel_id' => 'required|exists:channels,id',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Сохраняем изображение в хранилище приложения
        $imagePath = $request->file('image')->store('images', 'public');

        // добавляет в базу данных данные из формы
        $thread = Posts::create([
            'user_id' => auth()->id(),
            'channel_id' => request('channel_id'),
            'title' => request('title'),
            'body' => request('body'),
            'image_path' => $imagePath,
        ]);

        return redirect($thread->path());
    }
}
