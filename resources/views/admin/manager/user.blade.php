@extends('admin.manager.index')

@section('user')
    <div class="row" style="margin-top: 40px;">
        <div class="col-sm-12 col-md-4 text-center">
            <img src="{{ $user->avatar_url }}" width="50%" style="text-align: center;">
        </div>
        <div class="col-sm-12 col-md-8" >
            <div class="row justify-content-center">
                {{ $userUtil->getUserFullName() }}
            </div>
            <div class="row justify-content-center">
                <a href="{{ $userUtil->generateVkUrl() }}">Страница ВК</a>
            </div>
            <div class="row justify-content-center">
                Тип доступа к системе: {{ $userUtil->getPrimaryRoleName() }}
            </div>
            <div class="row justify-content-center" style="margin-top: 20px;">
                <div class="col-6">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                        Редактировать
                    </button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal1">
                        {{ $user->is_banned ? 'Разбанить' : 'Забанить' }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Редактирование пользователя: {{ $userUtil->getUserFullName() }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.manager.user.edit_role', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Выберите права для пользователя:</label>
                            <select name="role" class="form-control" id="exampleFormControlSelect1">
                                @foreach($userUtil->getAllRoles() as $roleValue => $roleName)
                                    <option value="{{ $roleValue }}">{{ $roleName }}</option>
                                @endforeach
                                    <option value="0">Обыватель</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Бан пользователя: {{ $userUtil->getUserFullName() }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Вы уверены, что хотите его забанить? Только если он реально этого заслужил, ну или он Гоша!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>

                    <form action="{{ route('admin.manager.user.ban', $user) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="btn btn-warning">Забанить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection