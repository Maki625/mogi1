@extends('layouts.app')

@section('content')

<main>
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">


    <div class="section-header">
    <a href="#" class="section-link active" data-target="recommend">おすすめ</a>
    <a href="#" class="section-link" data-target="mylist">マイリスト</a>
    </div>
    <hr class="divider">

    <div id="recommend" class="wrapper">

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
    </div>

    <div id="mylist" class="wrapper">
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
    </div>

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

</main>

@endsection