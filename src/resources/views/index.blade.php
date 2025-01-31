@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>contact</h2>
  </div>
  <form class="form" action="/confirm" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--name">
          <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}" />
          <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" />
        </div>
        <div class="form__error">
          @error('last_name')
          <p class="error-message">{{ $message }}</p>
          @enderror
          @error('first_name')
          <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <label class="form__label--item">性別</label>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <label class="form__radio-label">
          <label>
            <input type="radio" name="gender" value="男性" class="form__radio--styled" {{ old('gender') == '男性' ? 'checked' : '' }}>
            男性
          </label>
          <label>
            <input type="radio" name="gender" value="女性" class="form__radio--styled" {{ old('gender') == '女性' ? 'checked' : '' }}>
            女性
          </label>
          <label>
            <input type="radio" name="gender" value="その他" class="form__radio--styled" {{ old('gender') == 'その他' ? 'checked' : '' }}>
            その他
          </label>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
        </div>
        <div class="form__error">
          @error('email')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">電話番号</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--phone">
          <div class=" phone-group">
            <input type="tel" name="phone1" placeholder="090" maxlength="3">
            <span class="phone-separator"> - </span>
            <input type="tel" name="phone2" placeholder="1234" maxlength="4">
            <span class="phone-separator"> - </span>
            <input type="tel" name="phone3" placeholder="5678" maxlength="4">
          </div>
        </div>
        <div class="form__error">
          @error('tel')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="address" placeholder="例: 東京都渋谷区世田谷1-2-3" value="{{ old('address') }}" />
        </div>
        <div class="form__error">
          @error('name')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" />
        </div>
        <div class="form__error">
          @error('name')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせの種類</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <select name="category_id" class="form__select--input">
            <option value="">選択してください</option>
            @foreach ($categories as $category)
            <option value="{{ $category->content }}" {{ old('category_id') == $category->content ? 'selected' : '' }}>
              {{ $category->content }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form__error">
          @error('category_id')
          <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ内容</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--textarea">
          <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
        </div>
      </div>
    </div>

    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面</button>
    </div>
  </form>
</div>
@endsection