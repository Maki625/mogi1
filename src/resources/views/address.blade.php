@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/address.css') }}">
    @yield('css')

<main>
<link href="{{ asset('css/address.css') }}" rel="stylesheet">

    <div class="container">
        <h2 class="page-title">住所の変更</h2>

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
                <label>郵便番号</label>
                <input type="text" name="postal_code" value="{{ old('postal_code') }}">
</div>

<div class="form-group">
                <label>住所</label>
                <input type="text" name="address" value="">
</div>

<div class="form-group">
                <label>建物名</label>
                <input type="text" name="building_name" value="">
</div>

<button type="submit" name="update" class="update-btn" value="update">更新する</button>

</form>
</main>


@endsection