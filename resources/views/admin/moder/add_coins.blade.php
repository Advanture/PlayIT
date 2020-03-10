@extends('admin.layouts.base')

@section('base')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-3" style=" margin-top: 50px; margin-bottom: 50px;">
                <button type="button" class="btn btn-lg btn-primary btn-block">Вернуться в меню</button>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12">
                <h1 style="text-align: center; margin-bottom: 20px;">Добавление очков</h1>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Выберите пользователя</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput">Введите количество очков</label>
                        <input type="text" class="form-control" id="exampleFormControlInput" placeholder="666">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Введите комментарий, где укажите за что зачисляются человеку очки!</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block">Отправить</button>
                    <br><br>
                </form>
            </div>

        </div>

    </div>
@endsection