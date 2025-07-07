@extends('layouts.app')

@section('content')

<link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <div class="container">
        <h2 class="page-title">ログイン</h2>

@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif

<form class="form" method="POST" action="/login">
  @csrf 

<div class="form-group">
                <label>メールアドレス</label>
                <input type="text" name="email" value="{{ old('email') }}">
</div>

<div class="form-group">
                <label>パスワード</label>
                <input type="password" name="password" value="">
</div>

<button type="submit" name="send" class="send-btn" value="create">ログインする</button>

<a class="register-url" href="/register">会員登録はこちら</a>

</form>

@endsection