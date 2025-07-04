@extends('layouts.app')

@section('content')

<link href="{{ asset('css/edit.css') }}" rel="stylesheet">

    <div class="container">
        <h2 class="page-title">プロフィール設定</h2>

@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif

<form class="form" method="PUT" action="/mypage/profile">
  @csrf 

  <div class="form-group">
  <label for="profile_image" class="custom-file-label">画像を選択する</label>
  <input type="file" id="profile_image" name="profile_image" class="hidden-file-input">
</div>

<div class="form-group">
                <label>ユーザー名</label>
                <input type="text" name="username"  value="{{ old('username') }}">
</div>

<div class="form-group">
                <label>郵便番号</label>
                <input type="text" name="postal_code" value="{{ old('postal_code') }}">
</div>

<div class="form-group">
                <label>住所</label>
                <input type="text" name="address" value="{{ old('address') }}">
</div>

<div class="form-group">
                <label>建物名</label>
                <input type="text" name="building_name" value="{{ old('building_name') }}">
</div>


<button type="submit" name="send" class="update-btn" value="update">更新する</button>

</form>

@endsection