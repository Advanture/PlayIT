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
                    <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">Генерация промокода</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Засчитывание заданий</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-check-tab" data-toggle="pill" href="#pills-check" role="tab" aria-controls="pills-check" aria-selected="false">Добавление очков</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-table-tab" data-toggle="pill" href="#pills-table" role="tab" aria-controls="pills-table" aria-selected="false">Список покупок</a>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent" style="margin-top: 20px;">

                <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><!-- ГЕНЕРАЦИЯ ПРОМОКОДА -->
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-12">
                            <h1 style="text-align: center; margin-bottom: 20px;">Генерация промокода</h1>
                            <form action="{{ route('admin.moder.promocode.generate') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Выберите задание</label>
                                    <select name="task" class="form-control" id="exampleFormControlSelect2">
                                        @foreach($tasks as $task)
                                            <option value="{{ $task->id }}">{{ $task->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput">Введите количество использования промокода</label>
                                    <input name="count" type="text" class="form-control" id="exampleFormControlInput" placeholder="3">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput">Промокод</label>
                                    <input value="{{ session('promocode') ?: '' }}" readonly type="text" class="form-control" style="border-color: red;" id="exampleFormControlInput" placeholder="Нажми сгенерировать">
                                </div>

                                <button type="submit" class="btn btn-success btn-lg btn-block">Сгенерировать</button>
                                <br><br>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" ><!-- Засчитывание заданий -->
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-12">
                            <h1 style="text-align: center; margin-bottom: 20px;">Засчитывание заданий</h1>
                            <form action="{{ route('admin.moder.task.achievement') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Выберите пользователя</label>
                                    <select name="userId" class="form-control" id="exampleFormControlSelect1">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->first_name.' '. $user->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Выберите задание</label>
                                    <select name="taskId" class="form-control" id="exampleFormControlSelect2">
                                        @foreach($tasks as $task)
                                            <option value="{{ $task->id }}">{{ $task->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg btn-block">Отправить</button>
                                <br><br>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-check" role="tabpanel" aria-labelledby="pills-check-tab"><!-- Добавление очков -->
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-12">
                            <h1 style="text-align: center; margin-bottom: 20px;">Добавление очков</h1>
                            <form action="{{ route('admin.moder.add_coins') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Выберите пользователя</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="id">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->first_name.' '. $user->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput">Введите количество очков</label>
                                    <input type="text" class="form-control" name="coins" id="exampleFormControlInput" placeholder="666">
                                </div>

                                <button type="submit" class="btn btn-success btn-lg btn-block">Отправить</button>
                                <br><br>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-table" role="tabpanel" aria-labelledby="pills-table-tab"><!-- Статусы заказов -->
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-12">
                            <h1>Списки покупок</h1>
                            <table class="table table-dark" style="font-size: 16px;">
                                <thead>
                                <tr>
                                    <th scope="col">
                                        #
                                    </th>
                                    <th scope="col">
                                        ФИО
                                    </th>
                                    <th scope="col">
                                        Ссылка
                                    </th>
                                    <th scope="col">
                                        Товар
                                    </th>
                                    <th scope="col">
                                        Статус
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $order->user->first_name }} {{ $order->user->last_name }}</td>
                                    <td><a target="_blank" href="https://vk.com/id{{ $order->user->vk_id }}">VK</a></td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>
                                        <form action="{{ route('admin.moder.orders', $order) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <button class="btn btn-success" type="submit">Получен</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
