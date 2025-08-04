@extends('layouts.app')

@section('content')

<link href="{{ asset('css/exhibition.css') }}" rel="stylesheet">

<div class="container">
  <h2 class="page-title">商品の出品</h2>

@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif

<form class="form" method="POST" action="/sell" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <h2 class="product-img">商品画像</h2>
      <div class="outer-box">
        <label for="product_image" class="custom-file-label">画像を選択する</label>
        <p id="file-name" class="filename"></p>

        <input type="file" id="product_image" name="product_image" class="hidden-file-input">
      </div>

  </div>

<div class="form-group">
                <h2 class="details-title">商品の詳細</h2>
                <hr class="divider">

                <label class="category">カテゴリー</label>
                <div class="category-group">
    @foreach ($categories as $category)
    <input type="checkbox" id="category-{{ $category->id }}" name="categories[]" value="{{ $category->id }}"
        {{ (is_array(old('categories')) && in_array($category->id, old('categories'))) ? 'checked' : '' }}>
    <label for="category-{{ $category->id }}">{{ $category->name }}</label>
    @endforeach
</div>
</div>

<div class="form-group">
                <h2 class="condition">商品の状態</h2>
                  <select name="product_condition">
                    <option value="">選択してください</option>
                    <option value="1" {{ old('product_condition') == '1' ? 'selected' : '' }}>良好</option>
                    <option value="2" {{ old('product_condition') == '2' ? 'selected' : '' }}>目立った傷や汚れなし</option>
                    <option value="3" {{ old('product_condition') == '3' ? 'selected' : '' }}>やや傷や汚れあり</option>
                    <option value="4" {{ old('product_condition') == '4' ? 'selected' : '' }}>状態が悪い</option>
                  </select>
</div>

<div class="form-group">
                <h2 class="description-title">商品名と説明</h2>
                <hr class="divider">

                <label class="product_name">商品名</label>
                <input type="text" name="product_name" value="{{ old('product_name') }}">
</div>

<div class="form-group">
                <label class="brand_name">ブランド名</label>
                <input type="text" name="brand_name" value="{{ old('brand_name') }}">
</div>

<div class="form-group">
                <label class="product_description">商品の説明</label>
                <input type="textarea" name="product_description" value="{{ old('product_description') }}">
</div>

<div class="form-group">
                <label class="price">販売価格</label>
                <input type="text" name="price" value="{{ old('price') }}">
</div>

<button type="submit" name="send" class="send-btn" value="create">出品する</button>

</form>

<script>
document.getElementById('profile_image').addEventListener('change', function () {
    const fileName = this.files[0]?.name || '';
    document.getElementById('file-name').textContent = fileName;
});
</script>

@endsection