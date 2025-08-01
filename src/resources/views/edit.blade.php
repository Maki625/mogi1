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

<form class="form" method="POST" action="/mypage/profile" enctype="multipart/form-data">
  @csrf
  @method('PUT')

<div class="form-group image-upload-wrapper">
    @if ($user->profile && $user->profile->profile_image)
      <img src="{{ asset('storage/profile_images/' . $user->profile->profile_image) }}" alt="" class="profile-preview">
    @else
      <div class="profile-preview no-image"></div>
    @endif

    <label for="profile_image" class="custom-file-label">画像を選択する</label>
    <input type="file" id="profile_image" name="profile_image" class="hidden-file-input">

    {{-- ファイル名を表示する場所 --}}
    <p id="file-name" class="filename"></p>
</div>

<div class="form-group">
                <label class="name">ユーザー名</label>
                <input type="text" name="name"  value="{{ old('name', $user->name) }}">
</div>

<div class="form-group">
                <label class="postal_code">郵便番号</label>
                @if ($user->profile)
                  <input type="text" name="postal_code" value="{{ old('postal_code', $user->profile->postal_code) }}">
                @else
                  <input type="text" name="postal_code" value="">
                @endif
</div>

<div class="form-group">
                <label class="address">住所</label>
                @if ($user->profile)
                  <input type="text" name="address" value="{{ old('address', $user->profile->address) }}">
                @else
                  <input type="text" name="address" value="">
                @endif
</div>

<div class="form-group">
                <label class="building">建物名</label>
                @if ($user->profile)
                  <input type="text" name="building_name" value="{{ old('building_name', $user->profile->building_name) }}">
                @else
                  <input type="text" name="building_name" value="">
                @endif
</div>


<button type="submit" name="send" class="update-btn" value="update">更新する</button>

</form>

<script>
document.getElementById('profile_image').addEventListener('change', function () {
    const fileName = this.files[0]?.name || '';
    document.getElementById('file-name').textContent = fileName;
});
</script>

@endsection