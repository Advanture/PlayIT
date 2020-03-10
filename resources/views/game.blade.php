@extends('layouts.base')


@section('base')
    <div class="container" style="font-size: 16px;">
        <div class="row">
            <div class="col-5"></div>
            <div class="col-1">
                <form action="{{ route('game.over') }}" method="POST">
                    @csrf
                    <input name="points" type="text"
                           hidden placeholder="Не лезь, хацкер, получишь банан" id="total_score">
                    <input type="text" hidden name="_h" id="h_v">
                    <button class="btn" type="submit">ОТПРАВИТЬ РЕЗУЛЬТАТ</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('title', 'GAME FOR HONOR')

@push('scripts')
    <script>
        var MC = '{{ md5($authUser->balance->max_points) }}';
    </script>
@endpush

@push('scripts')
    <script src="{{ asset('js/md5.min.js') }}"></script>
    <script src="{{ asset('static/scripts/phaser.js') }}?{{ Str::random(16) }}"></script>
    <script type="text/javascript" src = "{{ asset('static/scripts/script.js') }}?{{ Str::random(16) }}"></script>
    <script type="text/javascript" src = "{{ asset('static/scripts/enemy.js') }}?{{ Str::random(16) }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('static/css/style.css') }}?{{ Str::random(16) }}">
@endpush
