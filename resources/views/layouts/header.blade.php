<div class="row">
    <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 order-2 order-sm-1">
        <div class="left-btns">
            <div class="info" onclick="openNav()"></div>
            @if (! request()->routeIs('home'))
            <a href="{{ route('home')}}"><div class="back"></div></a>
            @endif
        </div>
    </div>
    @section('title_header')
    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 order-1 order-sm-2">
        <div class="page-ttl">@yield('title')</div>
    </div>
    @show
    @stack('in_header')
    <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 order-3 order-sm-3">
        <div class="rigth-btns">
            <div class="coins">{{ $coins }}</div>
            <div class="flexcoin"></div>
        </div>
    </div>
</div>
