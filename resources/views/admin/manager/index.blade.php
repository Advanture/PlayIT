@extends('admin.layouts.base')

@section('base')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12" style=" margin-top: 40px;">
                <form action="{{ route('admin.manager.maintenance') }}" method="POST">
                    @method('PUT')
                    @csrf

                    <button style=" margin-top: 100px;" class="btn btn-info"
                            type="submit">{{ $maintenanceStatus ?
                            'Выключить режим обслуживания' : 'Включить режим обслуживания' }}</button>
                </form>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12" style=" margin-top: 40px; margin-bottom: 40px;">
                <a class="btn btn-lg btn-info btn-block" role="button" href="{{ route('admin.home')}}">На главную</a>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-sm-12 col-md-12" style="margin-top: 40px;">
                <form class="form-inline justify-content-center"
                      method="POST" action="{{ route('admin.manager.search') }}">
                    @csrf
                    <input name="id"
                           class="form-control col-10"
                           type="text" placeholder="Поиск пользователя (по VK ID)" aria-label="Search">
                    <button class="btn btn-info" type="submit">Начать поиск</button>
                </form>
            </div>
        </div>

        @yield('user')

    </div>
    </div>
@endsection
