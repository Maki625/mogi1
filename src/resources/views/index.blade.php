@extends('layouts.app')

@section('content')

<main>
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">


    <div class="section-header">
        <a href="/" class="section-link {{ request('tab') === 'recommend' || !request()->has('tab') ? 'active' : '' }}">おすすめ</a>
        <a href="/?tab=mylist" class="section-link {{ request('tab') === 'mylist' ? 'active' : '' }}">マイリスト</a>
    </div>
    <hr class="divider">

    <div class="wrapper">
    @if($tab === 'mylist')
    @auth
        @if($products->isEmpty())
            <p>お気に入りはまだありません。</p>
        @else
            @foreach ($products as $product)
                <a href="/item/{{ $product->id }}" class="card-link">
                    <div class="card">
                        <div class="product-img">
                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}">
                        </div>
                        <div class="text-box">
                            <span class="name">{{ $product->product_name }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif
    @else
    @endauth

            @else
            {{-- おすすめ（全商品）表示 --}}
            @foreach ($products as $product)
                <a href="/item/{{ $product->id }}" class="card-link">
                    <div class="card">
                        <div class="product-img">
                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}">
                        </div>
                        <div class="text-box">
                            <span class="name">{{ $product->product_name }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif
    </div>

</main>

@endsection