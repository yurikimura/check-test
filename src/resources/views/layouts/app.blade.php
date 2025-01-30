<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Check-Test</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        FashionablyLate
      </a>
      @if (!request()->is('confirm') && !request()->is('/'))
      <a class="header__register" href="@yield('register_link', '/login')">
        @yield('register_text', '')
      </a>
      @endif
    </div>

    <form class="form" action="/logout" method="post">
      @csrf
      <button class="header-nav__button">ログアウト</button>
    </form>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>