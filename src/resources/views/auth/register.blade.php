@extends('layouts.app')

@section('content')

<link href="{{ asset('css/register.css') }}" rel="stylesheet">

    <div class="container">
        <h2 class="page-title">会員登録</h2>

@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif

<form class="form" method="POST" action="/register">
  @csrf 
  
  <div class="form-group">
                <label>ユーザー名</label>
                <input type="text" name="username"  value="{{ old('username') }}">

</div>

<div class="form-group">
                <label>メールアドレス</label>
                <input type="text" name="email" value="{{ old('email') }}">
</div>

<div class="form-group">
                <label>パスワード</label>
                <input type="password" name="password" value="">
</div>

<div class="form-group">
                <label>確認用パスワード</label>
                <input type="password" name="password_confirmation" value="">
</div>

<button type="submit" name="send" class="send-btn" value="create">登録する</button>

<a class="login-url" href="/login">ログインはこちら</a>

</form>

@endsection