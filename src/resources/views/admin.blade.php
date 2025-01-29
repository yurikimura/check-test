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

    <form action="{{ route('admin.search') }}" method="post">
      @csrf
      <div class="form__group">
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="input" placeholder="名前やメールアドレスを入力せてください" value="{{ old('input') }}" />
          </div>
        </div>
    </form>
    @if(isset($item))
    <div class="search-result">
      <p>検索結果:</p>
      <p>{{ $item->name }}</p>
    </div>
    @endif
    <select class="gender_input" , class="form__select--input">
      <option value="">性別</option>
      <option value="male">男性</option>
      <option value="female">女性</option>
      <option value="female">その他</option>
    </select>

    <select class="select-box" , class="form__select--input">
      <option value="">お問い合わせの種類</option>
      <option value="product">一般的なお問い合わせ</option>
      <option value="exchange">サポートに関するお問い合わせ</option>
      <option value="exchange">商品の交換について</option>
    </select>

    <input name="date" type="date" />
  </div>

  <div class="actions">
    <button class="btn btn-search">検索</button>
    <button class="btn btn-reset">リセット</button>
    <form action="{{ route('export.csv') }}" method="GET">
      <button type="submit">エクスポート</button>
    </form>
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