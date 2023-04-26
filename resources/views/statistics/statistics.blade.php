@extends('layouts.site')

@section('content')
    <h1>статистика</h1>
    <p>Количество фотографий: {{ $statistics->quantity_photo }}</p>
    <p>Количество альбомов: {{ $statistics->quantity_album }}</p>
    <p>Количество комментариев: {{ $statistics->quantity_comment }}</p>
    <p>Количество просмотров: {{ $statistics->quantity_views }}</p>
    <p>Количество лайков: {{ $statistics->quantity_likes }}</p>
    <p>Количество дизлайков: {{ $statistics->quantity_deaslikes }}</p>
    <p>Количество отмеченных фотографий: {{ $statistics->quantity_photo_elected }}</p>
@endsection
