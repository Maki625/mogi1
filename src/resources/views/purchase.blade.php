@extends('layouts.app')

@section('content')
<link href="{{ asset('css/purchase.css') }}" rel="stylesheet">

@if ($errors->has('payment_method'))
    <div class="error-message">
        {{ $errors->first('payment_method') }}
    </div>
@endif

<form action="/purchase/{{ $product->id }}" method="POST">
    @csrf

    <div class="container">
        <div class="detail-group">
            <div class="product-header">
                <div class="item-image">
                <img src="{{ asset($product->product_image) }}" alt="商品画像">
                </div>

                <div class="label-group">
                <h1 class="name">{{ $product->product_name }}</h1>
                <p class="price">¥{{ $product->price }}</p>
                </div>
            </div>

        <h2 class="payment-title">支払い方法</h2>
        <select name="payment_method" id="productSelect">
            <option value="">選択してください</option>
            <option value="コンビニ支払い" {{ (old('payment_method') ?? $selected_payment_method) == 'コンビニ支払い' ? 'selected' : '' }}>コンビニ支払い</option>
            <option value="カード支払い" {{ (old('payment_method') ?? $selected_payment_method) == 'カード支払い' ? 'selected' : '' }}>カード支払い</option>
        </select>

        <h2 class="address-title">配送先</h2>

        <a class="address-url" href="/purchase/address/{{ $product->id }}">変更する</a>

        <div class="postal-code">〒{{ $purchaseAddress['postal_code'] ??$user->profile->postal_code }}</div>
        <p class="address">{{
        $purchaseAddress['address'] ??$user->profile->address }}</p>
        <p class="building_name">{{
        $purchaseAddress['building_name'] ??
        $user->profile->building_name }}</p>
    </div>

    <div class="payment-wrapper">
        <div class="price-group">
            <p class="price-title">商品代金</p>
            <p class="price">¥{{ $product->price }}</p>
        </div>

        <div class="payment-group">
            <p class="payment-method_title">支払い方法</p>
            <div id="selectedProductDisplay" class="selected-display"></div>
        </div>

        <input type="hidden" name="postal_code" value="{{ old('postal_code', $purchaseAddress['postal_code'] ?? $user->profile->postal_code) }}">
        <input type="hidden" name="address" value="{{ old('address', $purchaseAddress['address'] ??$user->profile->address) }}">
        <input type="hidden" name="building_name" value="{{ old('building_name',
        $purchaseAddress['building_name'] ?? $user->profile->building_name) }}">
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <button type="submit" name="purchase" class="purchase-btn" value="purchase">購入する</button>
    </div>
</form>

<script>
const select = document.getElementById('productSelect');
const displayDiv = document.getElementById('selectedProductDisplay');

// 初期表示
const sessionValue = @json(session('selected_payment_method'));
if (sessionValue) {
    select.value = sessionValue;
    displayDiv.textContent = sessionValue;
} else {
    displayDiv.textContent = "支払い方法を選択してください";
}

// セレクト変更時の処理＋セッション保存
select.addEventListener('change', function () {
    const selectedValue = this.value;
    displayDiv.textContent = selectedValue || "支払い方法を選択してください";

    // AJAXでセッションに保存
    fetch('/purchase/set-payment-method', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ payment_method: selectedValue })
    }).then(response => {
        if (!response.ok) {
            console.error("セッション保存失敗");
        }
    });
});
</script>


@endsection

