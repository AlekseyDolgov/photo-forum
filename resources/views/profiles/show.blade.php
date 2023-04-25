@extends('layouts.site')

{{--<p>Имя: {{ $user->name }}</p>--}}
{{--<p>Почта: {{ $user->email }}</p>--}}
{{--<img src="{{ asset('storage/' . $user->user_photo)}}" style="max-width: 100%; height: 125px; margin: 20px 0;">--}}
{{--<p>{{ $user->user_photo }}</p>--}}
{{--<p>{{ $user->about_me }}</p>--}}
{{--<p>{{ $user->last_vist }}</p>--}}
{{--<p>{{ $user->photo_technic }}</p>--}}
{{--<p>{{ $user->place_residence }}</p>--}}
{{--<p>{{ $user->last_name }}</p>--}}
{{--<p>{{ $user->patronymic }}</p>--}}
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $user->user_photo) }}" style="max-width: 100%; height: 40%; margin: 20px 0;" class="img-fluid rounded">
            <h1>имя: {{ $user->name }}</h1>
            <p>фамилия: {{ $user->last_name }} отчество: {{ $user->patronymic }}</p>
            <p class="mt-3">О себе: {{ $user->about_me }}</p>

        </div>
        <div class="col-md-6">
            <h3>Доп. Информация:</h3>
            <p>фото-техника: {{ $user->photo_technic }}</p>
            <p>почта: {{ $user->email }}</p>
            <p>место проживания: {{ $user->place_residence }}</p>
            <p>дата рождения: {{ $user->last_vist }}</p>
            <p>номер телефона: {{$user->Phone}} </p>
            <p>сайт: <a href="{{$user->Site}}">{{$user->Site}}</a></p>
            <a href="#">статистика</a>
        </div>
    </div>
</div>
@endsection
