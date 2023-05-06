@extends('layouts.site')

@section('content')
    <h4>Добавление доп. информации</h4>

        <div class="container py-4">
            <div class="row justify-content-md-center">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card mb-3">
                        <div class="card-header">Создать новую Тему</div>

                        <div class="card-body">
                            <form action="/profiles/{{Auth::user()->id}}/add" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="birthday">Добавить дата рождения</label>
                                    {{ Form::date('birthday', \Carbon\Carbon::now(), ['class' => 'form-control', 'required']) }}
                                    <label for="phone">Добавить номер телефона:</label>
                                    <input type="tel" class="form-control" name="phone" placeholder="Введите номер телефона" required>
                                    <label for="place_residence">Мето проживания:</label>
                                    <input type="text" class="form-control" name="place_residence" placeholder="Введите ваше место проживания" required>
                                    <label for="body">фото-техника:</label>
                                    <textarea name="photo_technic" id="body" class="form-control"
                                              rows="8" required>{{ old('body') }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
