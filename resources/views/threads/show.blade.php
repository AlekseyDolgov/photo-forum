@extends('layouts.site')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="level">
                            <span class="flex">
                                <a href="{{ url('/profiles/' . $thread->creator->id) }}">{{ $thread->creator->name }}</a> опубликовал:
                                {{ $thread->title }}
                            </span>
{{--для админов--}}
                            @if(auth()->check() && (auth()->user()->isAdmin() || auth()->user()->id == $thread->user_id))
                                <form action="{{ $thread->path() }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-link">Удалить тему</button>
                                </form>
                            @endif

                        </div>
                    </div>
                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>

                <img src="{{ asset('storage/' . $thread->image_path) }}" alt="{{ $thread->title }}" style="max-width: 100%; height: auto; margin: 20px 0;">
                {{ $replies->links() }}
                @foreach ($replies as $reply)
                    @include ('threads.reply')
                @endforeach
                @if (auth()->check())
                    <form method="POST" action="{{ $thread->path() . '/replies' }}">
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
                            Тема была опубликована {{ $thread->created_at->format('d-m-Y') }} в {{ $thread->created_at->format('H:i:s') }}
                            Опубликовал: <a href="{{ url('/profiles/' . $thread->creator->id) }}">{{ $thread->creator->name }}</a>.
                            Сообщений в теме: {{ $thread->replies_count }}.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
