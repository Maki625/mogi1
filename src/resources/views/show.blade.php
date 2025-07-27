@extends('layouts.app')

@section('content')
<link href="{{ asset('css/show.css') }}" rel="stylesheet">

<div class="container">
    <div class="image-group">
    <img src="{{ asset($product->product_image) }}" alt="商品画像">
    </div>

    <div class="show-group">
        <h1 class="name">{{ $product->product_name }}</h1>

        <p class="brand_name">{{ $product->brand_name ?? '' }}</p>
        <p class="price">¥{{ $product->price }}(税込)</p>

        <div class="button-wrapper">
        @if(auth()->check() && auth()->user()->favorites->contains($product->id))
        <form action="/item/{{ $product->id }}/favorite" method="POST">
        @csrf
        @method('DELETE')
            <button type="submit" class="fav-button active">★</button>
        </form>
        @else
        {{-- 未いいね（色なし） --}}
            <form action="{{ url('/item/' . $product->id . '/favorite') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="fav-button">☆</button>
            </form>
        @endif

        <div class="fav-count">{{ $product->favorites->count() }}</div>

        <a href="#" class="comment-button">💬</a>
        <p class="comment-count">{{ $product->comment_count }}</p>
        </div>

        <form action="/purchase/{{ $product->id }}" method="GET">
            <button type="submit" name="purchase" class="purchase-btn" value="purchase">購入手続きへ</button>
        </form>

        <h3 class="description-title">商品説明</h3>
        <p class="description">{{ $product->product_description }}</p>

        <h3 class="condition-title">商品の情報</h3>
        <div class="category_label">カテゴリー</div>
        @foreach($product->categories as $category)
            <span>{{ $category->name }}</span>
        @endforeach

        </span>
        <div class="condition_label">商品の状態</div>
        <span class="condition">{{ $product->condition_label }}</span>

        <span class="name">{{ $product->user->name }}</span>

    <form action="/item/{{ $product->id }}/comment" method="POST">
    @csrf

        <h3 class="comment-title">商品へのコメント</h3>

        <textarea name="comment" class="text-area">{{ old('comment') }}</textarea>
        @error('comment')
        <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit" class="comment-btn">コメントを送信する</button>
    </form>

    </div>
</div>

@endsection