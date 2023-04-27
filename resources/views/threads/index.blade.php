@extends('layouts.site')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-offset-2">
                @forelse ($threads as $thread)
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="level">
                                <div class="flex lead">
                                    <a class="text-decoration-none" href="{{ 'posts' . $thread->path() }}">
                                        {{ $thread->title }}
                                    </a>
                                </div>

                                <a class="text-decoration-none" href="{{ $thread->path() }}">
                                    Сообщений: {{ $thread->replies_count }}
                                </a>
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
