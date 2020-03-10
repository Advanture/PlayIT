@extends('layouts.base')

@section('base')
    <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 " style="opacity: 0.4;">
        <a href="#"><div class="mission"></div></a>
    </div>
    <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9 ">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                <a href="{{ route('game') }}">
                    <div class="game">
                        <div class="best-game">Лучший результат: {{ $maxPoints }}</div>
                    </div>
                </a>
                <a href="{{ route('shop.index') }}"><div class="shop"></div></a>
                <a href="{{ route('fortune.index') }}"><div class="fortune">
                        <div class="fortune-time">{{ $fortuneTime }}</div>
                    </div></a>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <a href="{{ route('profile') }}"><div class="profile"></div></a>
                <a href="{{ route('rating') }}"><div class="rating"></div></a>
                <a href="{{ route('news') }}"><div class="news"></div></a>
                <div class="social">
                    <a target="_blank" href="https://www.instagram.com/isit.sut/"><div class="inst"></div></a>
                    <a target="_blank" href="https://vk.com/isit_sut"><div class="vk"></div></a>
                    <a target="_blank" href="https://vk.com/im?media=&sel=-41638630"><div class="chat"></div></a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('title_header')
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 order-1 order-sm-1 order-md-2">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="">
        </div>
    </div>
@endsection

@section('title', 'Главная')
