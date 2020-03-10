@extends('layouts.base')

@section('base')
    @foreach($products as $product)
        @php $isBought = $authUser->products->contains($product); @endphp
        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3"
             @if($isBought) style="opacity: 0.3;" @endif>
            <div class="task-block">
                <div class="on-shop">{{ $product->in_stock }}шт</div>
                <div class="price-shop">{{ $product->price }}</div>
                <div class="task-img"><img src="{{ asset($product->img_url) }}" alt=""></div>
                <div class="task-wrapp">
                    <div class="task">
                        <div class="shop-ttl">{{ $product->name }}</div>
                        @if (($authUser->balance->current_coins >= $product->price) && ! ($isBought))
                        <a href="{{ route('shop.buy', $product) }}"><div class="buy-btn"></div></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('title', 'Магазин')