@extends('layouts.site')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="level">
                            <span class="flex">
                                опубликовал: <a href="{{ url('/profiles/' . $post->creator->id) }}">{{ $post->creator->name }}</a><br>
                                {{ $post->title }}
                            </span>
                            @if(auth()->check() && (auth()->user()->isAdmin() || auth()->user()->id == $post->user_id))
                                <form action="{{ $post->deleteUrl($_GET['post']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $_GET['post'] }}">
                                    <button type="submit" class="btn btn-link">Удалить тему</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $post->body }}
                    </div>
                </div>
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" style="max-width: 100%; height: auto; margin: 20px 0;">

                @foreach ($replies->sortByDesc('id') as $reply)
                    @include ('posts.reply')
                @endforeach

                @if (auth()->check())
                    <form method="POST" action="/replies">
                        {{ csrf_field() }}

                        <div class="form-group mb-3">
                            <textarea name="body" id="body" class="form-control" placeholder="Есть что сообщить?"
                                      rows="5"></textarea>
                            <input type="hidden" name="post_id" value="{{$_GET['post']}}">
                            <input type="hidden" name="thread_id" value="0">
                            <input type="hidden" name="comment_count" value="0">
                        </div>

                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @else
                    <p class="text-center">Пожалуйста <a href="{{ route('login') }}">войдите</a> для того чтобы учавствовать в обсуждении.</p>
                @endif
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <p>
                            Пост был опубликован {{ $post->created_at->format('d-m-Y') }} в {{ $post->created_at->format('H:i:s') }}
                            Количество комментариев : {{ $post->comment_count }}.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
