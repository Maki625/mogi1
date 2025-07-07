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

<form class="form" method="POST" action="/sell">
  @csrf 

  <div class="form-group">
                <label>商品画像</label>
                <input type="file" name="image">
</div>

<div class="form-group">
                <h2>商品の詳細</h2>
                <label>カテゴリー</label>
</div>

<div class="form-group">
                <label>商品の状態</label>
                  <select name="condition">
                    <option value="">選択してください</option>
                    <option value="1" {{ old('condition') == '1' ? 'selected' : '' }}>良好</option>
                    <option value="2" {{ old('condition') == '2' ? 'selected' : '' }}>目立った傷や汚れなし</option>
                    <option value="3" {{ old('condition') == '3' ? 'selected' : '' }}>やや傷や汚れあり</option>
                    <option value="4" {{ old('condition') == '4' ? 'selected' : '' }}>状態が悪い</option>
                  </select>
</div>

<div class="form-group">
                <h2>商品名と説明</h2>
                <label>商品名</label>
                <input type="text" name="product_name" value="">
</div>

<div class="form-group">
                <label>ブランド名</label>
                <input type="text" name="brand_name" value="">
</div>

<div class="form-group">
                <label>商品の説明</label>
                <input type="text-box" name="product_description" value="">
</div>

<div class="form-group">
                <label>販売価格</label>
                <input type="text" name="price" value="">
</div>



<button type="submit" name="send" class="send-btn" value="create">出品する</button>

</form>

@endsection