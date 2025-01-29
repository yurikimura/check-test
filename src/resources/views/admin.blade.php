@extends('layouts.appadmin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('register_text', 'Logout')
@section('register_link', route('logout'))

@section('content')
<div class="admin__content">
  <div class="admin-form__heading">
    <h2>Admin</h2>

    <div class="filters">
      <input type="text" class="search-input" placeholder="名前やメールアドレスを入力してください">

      <select class="select-box">
        <option value="">性別</option>
        <option value="male">男性</option>
        <option value="female">女性</option>
      </select>

      <select class="select-box">
        <option value="">お問い合わせの種類</option>
        <option value="product">商品について</option>
        <option value="exchange">商品の交換について</option>
      </select>

      <select class="select-box">
        <option value="">年/月/日</option>
      </select>
    </div>

    <div class="actions">
      <button class="btn btn-search">検索</button>
      <button class="btn btn-reset">リセット</button>
      <button class="btn btn-export">エクスポート</button>
    </div>

    <table class="data-table">
      <thead>
        <tr>
          <th>お名前</th>
          <th>性別</th>
          <th>メールアドレス</th>
          <th>お問い合わせの種類</th>
          <th>詳細</th>
        </tr>
      </thead>
      <tbody>
        @foreach($contacts as $contact)
        <tr>
          <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
          <td>{{ $contact->gender }}</td>
          <td>{{ $contact->email }}</td>
          <td>{{ $contact->category_id }}</td>
          <td>{{ $contact->detail }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection