@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

<body>
  <div class="background-text">Thank you</div>

  <div class="content">
    <p class="thank-you-text">お問い合わせありがとうございました</p>
    <a href="/" class="home-button">HOME</a>
  </div>
</body>

</html>