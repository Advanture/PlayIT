@extends('layouts.base')

@section('base')
    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 offset-0 offset-sm-0 offset-md-1 offset-lg-2 offset-xl-2 d-flex justify-content-center">
        <div class="photo">
            <img src="{{ $user->avatar_url }}" alt="">
        </div>
    </div>
    <div class="col-12 col-sm-8 col-md-5 col-lg-4 col-xl-4 offset-0 offset-sm-2 offset-md-0 offset-lg-0 offset-xl-0">
        <div class="profile-info">
            <div class="name">{{ $user->first_name }} {{ $user->last_name }}</div>
            <div class="rate-place">Место в рейтинге: {{ $rating['position'] }}</div>
            <div class="rate-info">Ваше место разделяют еще: {{ $rating['one_place'] }} </div>
            <div class="level">
                {{ $user->rank->name }}
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{ $rating['complete_progress_bar'] }}%"
                         aria-valuenow="{{ $rating['complete_progress_bar'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="xp">{{ $rating['remaining'] }} до следующего уровня</div>
            </div>
        </div>

    </div>
    <div class="col-12 col-sm-8 col-md-10 col-lg-8 col-xl-8 offset-0 offset-sm-2 offset-md-1 offset-lg-2 offset-xl-2">
        <div class="send">
            <form action="{{ route('promocode.use') }}" method="POST">
                @csrf
                <input name="code" type="text" class="code" placeholder="введите код..."><input type="submit" value="Отправить" class="send-btn">
            </form>
        </div>
    </div>
@endsection

@section('title', 'Профиль')