@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
  <div class="confirm__heading">
    <h2>confirm</h2>
  </div>
  <form class="form" action="/thanks" method="post">
    @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__text">
            <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly />
            <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            <input type="text" value="{{ $contact['gender'] == 1 ? '男性' : ($contact['gender'] == 2 ? '女性' : 'その他') }}" readonly />
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header"></th>
          <td class="confirm-table__text">
            <input type="tel" name="tel" value="{{ $contact['tel'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header"></th>
          <td class="confirm-table__text">
            <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
          </td>
        <tr class="confirm-table__row">
          <th class="confirm-table__header"></th>
          <td class="confirm-table__text">
            <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header"></th>
          <td class="confirm-table__text">
            <input type="text" value="{{ $contact['category_id'] == 14 ? '商品のお届けについて' : ($contact['category_id'] == 15 ? '商品の交換について' : ($contact['category_id'] == 16 ? '商品トラブル' : ($contact['category_id'] == 17 ? 'ショップへの問い合わせ' : 'その他'))) }}" readonly />
            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header"></th>
          <td class="confirm-table__text">
            <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
          </td>
        </tr>
      </table>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
      <a class="form__button-return" href="/">修正</a>
    </div>
    <div class="form__button">
    </div>
  </form>
</div>
@endsection