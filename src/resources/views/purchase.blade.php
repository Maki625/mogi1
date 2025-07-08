<link href="{{ asset('css/purchase.css') }}" rel="stylesheet">

<div class="container">
    <div class="image-group">
    <img src="{{ asset($product->product_image) }}" alt="商品画像">
    </div>

    <div class="detail-group">
        <h1 class="name">{{ $product->product_name }}</h1>
        <p class="price">¥{{ $product->price }}</p>

        <h2 class="payment-title">支払い方法</h2>
        <select name="payment" id="productSelect">
            <option value="">選択してください</option>
            <option value="コンビニ支払い" {{ old('payment') == '1' ? 'selected' : '' }}>コンビニ支払い</option>
            <option value="カード支払い" {{ old('payment') == '2' ? 'selected' : '' }}>カード支払い</option>
        </select>

        <h2 class="address-title">配送先</h2>
        <a class="address-url" href="/purchase/address/{item_id}">変更する</a>
        <p class="postal-code"></p>
        <p class="address"></p>
        <p class="building"></p>
    </div>

    <div class="payment-group">
        <p class="price-title">商品代金</p>
        <p class="price">¥{{ $product->price }}</p>
        <p class="payment-method_title">支払い方法</p>
        <div id="selectedProductDisplay" class="selected-display">
        </div>
        <p class="payment-method"></p>

        <form action="/" method="POST">
            @csrf
            <button type="submit" name="purchase" class="purchase-btn" value="purchase">購入する</button>
        </form>
</div>

<script>
document.getElementById('productSelect').addEventListener('change', function() {
    const selectedValue = this.value;
    const displayDiv = document.getElementById('selectedProductDisplay');
    
    if (selectedValue) {
        displayDiv.textContent = selectedValue;
    } else {
        displayDiv.textContent = "支払い方法を選択してください";
    }
});
</script>

