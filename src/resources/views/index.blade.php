商品一覧画面


<link href="{{ asset('css/index.css') }}" rel="stylesheet">

<div class="wrapper">
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
</div>
