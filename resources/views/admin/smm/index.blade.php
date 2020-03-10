@extends('admin.layouts.base')

@section('base')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12" style=" margin-top: 100px; margin-bottom: 40px;">
                <a class="btn btn-lg btn-info btn-block" role="button" href="{{ route('admin.home')}}">На главную</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <ul class="nav nav-pills nav-fill col-md-12" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Список новостей</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Добавление новости</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><!-- СПИСОК НОВОСТЕЙ -->
                    @foreach($newsList as $news)
                        <div class="row justify-content-center d-flex">
                            <div class="col-sm-12 col-md-12 d-flex justify-content-center" style="margin-top: 40px;">
                                <form action="{{ route('admin.smm.news.destroy', $news) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <h2>{{ $news->title }}
                                        <button class="btn btn-primary" type="submit">Удалить</button>
                                    </h2>
                                </form>
                            </div>
                            <div class="col-sm-12 col-md-12 d-flex justify-content-center" style="margin-top: 20px;">
                                <p>{{ $news->description }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><!-- Добавление новостей -->
                    <form style="margin-top: 40px;" method="POST" action="{{ route('admin.smm.news.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Введите заголовок</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Крутой заголовок Yota">
                            <small id="emailHelp" class="form-text text-muted">Только не ошибись, пожалуйста</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Введите текст новости</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Я не идиот и не перепутал слова, ибо пришлось бы удалять новость</label>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Отправить</button>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
