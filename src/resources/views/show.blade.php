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
        <div class="comment-count">{{ $product->comments->count() }}</div>
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

        <div class="comment-label">コメント</div>
        <div class="comment-count">( {{ $product->comments->count() }} )</div>

        @foreach($product->comments as $comment)
        <div class="form-group image-wrapper">
        @if ($comment->user->profile && $comment->user->profile->profile_image)
      <img src="{{ asset('storage/profile_images/' . $comment->user->profile->profile_image) }}" alt="" class="profile-preview">
    @else
      <div class="profile-preview no-image"></div>
    @endif
</div>

    <div class="comment">
        <div class="comment-user">{{ $comment->user->name ?? '匿名' }}</div></p>
        <div class="comment-content">{{ $comment->comment }}</div>
    </div>
@endforeach


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