@extends('layouts.app')

@section('content')
<main>
<link href="{{ asset('css/soldout.css') }}" rel="stylesheet">

    <div class="container">
        <h2>この商品はすでに購入されています。</h2>
        <a href="{{ url('/') }}" class="top-page">トップへ戻る</a>
    </div>
</main>
@endsection
