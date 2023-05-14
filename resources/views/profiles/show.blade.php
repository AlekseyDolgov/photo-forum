@extends('layouts.site')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $user->user_photo) }}" style="max-width: 100%; height: 40%; margin: 20px 0;" class="img-fluid rounded">

            <h1>имя: {{ $user->name }}</h1>
            <p>почта: {{ $user->email }}</p>
            <cite>username : {{$user->username}}</cite>
        </div>
        <div class="col-md-6">

            <a href="/profile">Редактировать профиль</a>

        </div>
    </div>
</div>
@endsection
