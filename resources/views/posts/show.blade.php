@extends('layouts.site')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="level">
                            <span class="flex">
                                <a href="{{ url('/profiles/' . $post->creator->id) }}">{{ $post->creator->name }}</a> опубликовал:
                                {{ $post->title }}
                            </span>
                            @if(auth()->check() && (auth()->user()->isAdmin() || auth()->user()->id == $post->user_id))
                                <form action="{{ $post->path($_GET['post']) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
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
{{--                {{ $replies->links() }}--}}
                {{--                @foreach ($replies as $reply)--}}
                {{--                    @include ('threads.reply')--}}
                {{--                @endforeach--}}
                @if (auth()->check())
                    <form method="POST" action="{{ $post->path($_GET['post']) . '/replies' }}">
                        {{ csrf_field() }}

                        <div class="form-group mb-3">
                            <textarea name="body" id="body" class="form-control" placeholder="Есть что сообщить?"
                                      rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                @else
                    <p class="text-center">Пожалуйста <a href="{{ route('login') }}">войдите</a> для того чтобы учавствовать в обсуждении.</p>
                @endif
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <p>
                            Тема была опубликована {{ $post->created_at->format('d-m-Y') }} в {{ $post->created_at->format('H:i:s') }}
                            Опубликовал: <a href="{{ url('/profiles/' . $post->creator->id) }}">{{ $post->creator->name }}</a>.
                            Сообщений в теме: {{ $post->replies_count }}.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
