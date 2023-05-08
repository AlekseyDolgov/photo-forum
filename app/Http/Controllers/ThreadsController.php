<?php

namespace App\Http\Controllers;

//use App\Models\Channel;
use App\Models\Thread;
use Illuminate\Http\Request;
use App\Filters\ThreadFilters;

class ThreadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $threads = Thread::all();

        return view('threads.index', compact('threads'));
    }

    public function create()
    {
        return view('threads.create');
    }

    public function store(Request $request)
    {
        // проверяет на ошибки
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'slug' => 'required',
        ]);

        // добавляет в базу данных данные из формы
        $thread = Thread::create([
            'slug' => request('slug'),
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect('/');
    }

    public function show(Thread $thread)
    {
        return view('threads.show', [
            'thread' => $thread,
            'replies' => $thread->replies()->paginate(20)
        ]);
    }

    public function destroy(Thread $thread)
    {
        if (auth()->user()->isAdmin() || auth()->user()->id == $thread->user_id) {
            $thread->delete();
            return redirect('/');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /*protected function getThreads(Channel $channel, ThreadFilters $filters)
    {
        $threads = Thread::latest()->filter($filters);
        if ($channel->exists) {
            $threads->where('channel_id', $channel->id);
        }

        return $threads->get();
    }*/
}
