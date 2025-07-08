<link href="{{ asset('css/show.css') }}" rel="stylesheet">

<div class="container">
    <div class="image-group">
    <img src="{{ asset($product->product_image) }}" alt="商品画像">
    </div>

    <div class="show-group">
        <h1 class="name">{{ $product->product_name }}</h1>

        <p class="brand_name">{{ $product->brand_name ?? '' }}</p>
        <p class="price">¥{{ $product->price }}(税込)</p>

        <a href="#" class="fav-button">☆ いいね</a>
        <div class="fav-count">{{ $product->like_count }}</div>

        <a href="#" class="comment-button">💬 コメント</a>
        <p class="comment-count">{{ $product->comment_count }}</p>

        <form action="/purchase/{{ $product->id }}" method="GET">
            <button type="submit" name="purchase" class="purchase-btn" value="purchase">購入手続きへ</button>
        </form>

        <h2 class="description-title">商品説明</h2>
        <p class="description">{{ $product->product_description }}</p>

        <div class="condition-title">商品の情報
        <span class="category">カテゴリー</span>
        <span class="condition">商品の状態</span>
        <span class="value">{{ $product->condition_label }}</span>
        </div>

        <h2 class="comment-title">コメント</h2>
        <span class="username">{{ $product->username }}</span>
        <span class="comment">商品へのコメント</span>
        <input type="text-box">

        <button type="submit" name="comment" class="comment-btn" value="comment">コメントを送信する</button>

    </div>



</div>
