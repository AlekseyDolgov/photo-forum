@extends('layouts.site')

{{--<h3>user-id: {{$profile->id}}</h3>--}}

{{--<img src="{{ asset('storage/' . $profile->user_photo)}}" style="max-width: 100%; height: 125px; margin: 20px 0;">--}}

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
<h1>страница пользователя</h1>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>{{ $user->name }}</h1>
            <p>{{ $user->email }}</p>
            <p>{{ $user->last_name }} {{ $user->patronymic }}</p>
            <p>{{ $user->place_residence }}</p>
            <p>{{ $user->last_vist }}</p>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $user->user_photo)}}" style="max-width: 100%; height: 125px; margin: 20px 0;" class="img-fluid rounded">
            <p class="mt-3">{{ $user->about_me }}</p>
            <p>{{ $user->photo_technic }}</p>
        </div>
    </div>
</div>
@endsection
