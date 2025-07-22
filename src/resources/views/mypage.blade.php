@extends('layouts.app')

@section('content')
<main>
<link href="{{ asset('css/mypage.css') }}" rel="stylesheet">

<div class="user-group">
    <img src="{{ asset('storage/profile_images/' . Auth::user()->profile_image) }}" alt="" class="profile-preview">

    <span class="username">{{ Auth::user()->name }}</span>

    <form action="/mypage/profile" method="GET">
    <button type="submit" name="send" class="edit-btn" value="edit">プロフィール編集</button>
    </form>
</div>

<div class="section-header">
    <a href="/mypage?tab=sold" class="section-link {{ request('tab') === 'sold' || !request()->has('tab') ? 'active' : '' }}">出品した商品</a>
    <a href="/mypage?tab=bought" class="section-link {{ request('tab') === 'bought' ? 'active' : '' }}">購入した商品</a>
</div>
<hr class="divider">

<div class="wrapper">
    @if (request('tab') === 'bought')
        @if($boughtProducts->isEmpty())
            <p>購入した商品はまだありません。</p>
        @else
            @foreach ($boughtProducts as $product)
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
        @if($soldProducts->isEmpty())
            <p>出品した商品はまだありません。</p>
        @else
            @foreach ($soldProducts as $product)
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
    @endif
</div>


</main>
@endsection

