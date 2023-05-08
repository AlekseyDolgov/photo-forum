@extends('layouts.site')

@section('content')
    <div class="bg-dark" style="height: 20px;">
        <div class="container py-2 d-flex justify-content-end" style="position: relative; top: -25px;">
            <a href="/create/?post={{$_GET['id']}}" class="btn btn-primary btn-sm" type="button">Добавить пост</a>
        </div>
    </div>
    <div class="container my-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($posts->sortByDesc('id') as $post)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{asset('storage/' . $post->image_path) }}" class="card-img-top img-fluid aspect-ratio-square @if($post->imageIsSmaller()) img-cover @endif" alt="">
                        <div class="card-body">
                            <a href="/store/{{$post->pathUrl()}}?post={{$post->id}}"><h5 class="card-title">{{ $post->title }}</h5></a>
                            <p class="card-text">{{ $post->body }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
