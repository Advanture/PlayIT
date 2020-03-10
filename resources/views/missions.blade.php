@extends('layouts.base')

@section('base')
    @foreach($tasks as $task)
    @if(! $task->users->contains($authUser))
    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
        <div class="task-block">
            <div class="price">{{ $task->coins }}</div>
            <div class="task-img"><img src="{{ asset($task->img_uri) }}" alt=""></div>
            <div class="task-wrapp">
                <div class="task">
                    <div class="task-ttl">{{ $task->title }}</div>
                    <div class="task-info">{{ $task->description }}</div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
@endsection

@section('title', 'Миссии')