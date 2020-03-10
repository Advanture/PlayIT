@extends('layouts.base')

@section('base')
    <div class="col-6 col-sm-1 col-md-1 col-lg-1 col-xl-1 order-2 order-sm-1">
        @if (! $balances->onFirstPage())
        <div class="rate-btn">
            <a href="{{ $balances->previousPageUrl() }}"><div class="prev-btn"></div></a>
        </div>
        @endif
    </div>
    <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 order-1 order-sm-2">
        @foreach($balances as $balance)
        <div class="rating-block">
            <div class="place">{{ ($balances->currentPage() - 1) * $balances->perPage() + $loop->iteration }}st</div>
            <div class="user-img">
                <img src="{{ $balance->user->avatar_url }}" alt="">
            </div>
            <div class="user-name">{{ $balance->user->first_name }} {{ $balance->user->last_name }}</div>
            <div class="user-points">{{ $balance->user->balance->$orderBy ?? '' }} xp</div>
        </div>
        @endforeach
    </div>
    <div class="col-6 col-sm-1 col-md-1 col-lg-1 col-xl-1 order-2 order-sm-3">
        @if ($balances->hasMorePages())
        <div class="rate-btn">
            <a href="{{ $balances->nextPageUrl() }}"><div class="next-btn"></div></a>
        </div>
        @endif
    </div>
@endsection

@push('under_header')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="rating-page">
                <div class="rate-project"><a href="{{ route('rating') }}">общий рейтинг</a>
                </div><span>/</span><div class="rate-game">
                    <a href="{{ route('rating', ['type' => 'game']) }}">рейтинг игры</a></div>
            </div>
        </div>
    </div>
@endpush

@section('title', 'Рейтинг')