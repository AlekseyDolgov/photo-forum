@extends('layouts.site')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-offset-2">
            @foreach($users->sortByDesc('id') as $user)
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="/banned" method="post">
                            @csrf
                        <a href="{{ url('/profiles/' . $user->id) }}">{{$user->name}}</a>
                        {{ Form::input('datetime-local', 'banned_until', \Carbon\Carbon::now()->format('Y-m-d\TH:i'), ['class' => 'form-control', 'required']) }}
                            <input type="hidden" name="user" value="{{$user->id}}">
                            <button type="submit" class="btn btn-secondary">
                            <i class="bi bi-lock"></i> Заблокировать
                        </button>
                        </form>
                    </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection
