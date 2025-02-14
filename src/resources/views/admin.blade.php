@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

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
        <select name="gender" class="gender_input" , class="form__select--input">
          <option value="">性別</option>
          <option value=1>男性</option>
          <option value=2>女性</option>
          <option value=3>その他</option>
        </select>

        <select name="category_id" class="category_input">
          <option value="">お問い合わせの種類</option>
          @foreach ($categories as $category)
          <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : (request('category_id') == $category->id ? 'selected' : '') }}>
            {{ $category->content }}
          </option>
          @endforeach
        </select>

        <input class="date_input" name="date" type="date" value="{{ request('date') }}" />
      </div>

      <div class="actions">
        <button type="submit" class="btn-search">検索</button>
        <button type="button" class="btn-reset" onclick="window.location.href='/admin'">リセット</button>
      </div>
    </form>

    @if(isset($item))
    <div class="search-result">
      <p>検索結果:</p>
      <p>{{ $item->name }}</p>
    </div>

    @endif
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
          <td>
            <a href="#modal-{{ $contact->id }}" class="detail-btn">詳細</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $contacts->appends(request()->except('page'))->links() }}
  </div>

  <!-- 各行ごとのモーダル -->
  @foreach($contacts as $contact)
  <div id="modal-{{ $contact->id }}" class="modal">
    <div class="modal-content">
      <a href="#" class="close-btn">×</a>
      <h3>お問い合わせ詳細</h3>
      <table class="modal-table">
        <tr>
          <th>お名前</th>
          <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
        </tr>
        <tr>
          <th>性別</th>
          <td>{{ $contact->gender }}</td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>{{ $contact->email }}</td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td>{{ $contact->tel }}</td>
        </tr>
        <tr>
          <th>住所</th>
          <td>{{ $contact->address }}</td>
        </tr>
        <tr>
          <th>建物名</th>
          <td>{{ $contact->building }}</td>
        </tr>
        <tr>
          <th>お問い合わせの種類</th>
          <td>{{ $contact->category_id }}</td>
        </tr>
        <tr>
          <th>お問い合わせ内容</th>
          <td>{{ $contact->detail }}</td>
        </tr>
      </table>
      <!-- 削除フォーム -->
      <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-btn">削除</button>
      </form>
    </div>
  </div>
  @endforeach
  @endsection