@extends('layouts.site')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-3">
                    <div class="card-header">Новый пост</div>

                    <div class="card-body">
                        <form method="POST" action="/posts" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group mb-3">
                                <label for="title">Заголовок:</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="body">Описание:</label>
                                <textarea name="body" id="body" class="form-control"
                                          rows="8" required>{{ old('body') }}</textarea>
                            </div>
                            <!-- фото-->
                            <div class="form-group">
                                <div class="form-group bmd-form-group is-focused file-input">
                                    <label for="photo">Выберите фотографию:</label>
                                    <input type="file" name="image_path" id="image_path" class="form-control-file">
                                    @error('photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{--                                @if ($errors->has('banner_img'))--}}
                                {{--                                    <span class="errormsg text-danger">{{ $errors->first('banner_img') }} </span>--}}
                                {{--                                @endif--}}
                            </div>

                            @foreach ($channels as $channel)
                                <input type="hidden" name="channel_id" value="{{ $channel->id }}">
                            @endforeach

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Опубликовать</button>
                            </div>

                            @if (count($errors))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
