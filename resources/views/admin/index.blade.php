@extends('admin.layouts.base')

@section('base')
    <div class="container-fluid" style="font-size: 16px;">
        <div class="row">
            @include('admin.layouts.aside')
        </div>
    </div>
    <div class="container" style="font-size: 16px;">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="h2">Статистика пользователей</h1>
                <canvas class="my-4 w-80" id="myChart" width="600" height="400"></canvas>
                <h2>Статистика какая нибудь</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Header</th>
                            <th>Header</th>
                            <th>Header</th>
                            <th>Header</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1,001</td>
                            <td>Lorem</td>
                            <td>ipsum</td>
                            <td>dolor</td>
                            <td>sit</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection