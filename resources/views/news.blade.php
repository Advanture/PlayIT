@extends('layouts.base')

@section('base')
    @foreach($news as $newsItem)
        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8 offset-md-1 offset-xl-2 offset-lg-2">
            <div class="info-new">
                <div class="time">{{ $newsItem->created_at->format('d.m H.i') }}</div>
                <div class="ttl-new">{{ $newsItem->title }}</div>
            </div>
            <div class="news-block">
                <div class="new">{{ $newsItem->description }}</div>
            </div>
        </div>
    @endforeach
@endsection

@section('title', 'Новости')