@extends('layouts.base')

@section('base')
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="fortune-number">
            <span class="random-number">{{ $canFortune ? '' : $fortuneTime }}</span>
        </div>
    </div>

    @if($canFortune)
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="fortune-start">
            <form id="furtune-start" action="{{ route('fortune.start') }}" method="POST">
                @csrf
                <div class="btn-start" onclick="document.getElementById('furtune-start').submit();">Крутить</div>
            </form>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="fortune-start">
            <input type="text" hidden="hidden" name="result" class="submit-number__result">
        </div>
    </div>
    @endif
@endsection

@section('title', 'Фортуна')

@push('styles')
    <style>
        .coins {
            display: none !important;
        }
    </style>
@endpush

@push('scripts')
    @if (isset($randomValue))
        <script>
        let resultValue = '{{ $randomValue }}';
        start();
    </script>
    @endif
@endpush