@extends('layouts.site')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-offset-2">
                @forelse ($threads as $thread)
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="level">
                                <div class="flex lead"> {{--"{{'posts' . $thread->path()}}" --}}
                                    <a class="text-decoration-none" href="posts/{{$thread->path()}}">
                                        {{ $thread->title }}
                                    </a>
                                    @if(auth()->check() && (auth()->user()->isAdmin()))
                                        <form action="delete" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{$thread->id}}">
                                            <button type="submit" class="btn btn-link">Удалить тему</button>
                                        </form>
                                    @endif
                                </div>


                                {{--                                <a class="text-decoration-none" href="{{ $thread->path() }}">--}}
                                {{--                                    Сообщений: {{ $thread->replies_count }}--}}
                                {{--                                </a>--}}
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="body">{{ $thread->body }}</div>
                        </div>
                    </div>
                @empty
                    <p>Пока что здесь ничего нет.</p>
                @endforelse

            </div>
        </div>
    </div>
@endsection
