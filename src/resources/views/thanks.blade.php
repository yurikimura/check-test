<!-- @extends('layouts.app') -->

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

<!-- @section('content')
<div class="thanks__content">
  <div class="thanks__heading">
    <h2>お問い合わせありがとうございます</h2>
  </div>
</div>
@endsection -->

<style>
  body {
    margin: 0;
    padding: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    position: relative;
    overflow: hidden;
  }

  .background-text {
    position: absolute;
    font-size: 180px;
    color: rgba(242, 236, 230, 0.5);
    white-space: nowrap;
    z-index: -1;
    font-weight: 200;
  }

  .content {
    text-align: center;
    z-index: 1;
  }

  .thank-you-text {
    color: #766356;
    font-size: 24px;
    margin-bottom: 40px;
  }

  .home-button {
    display: inline-block;
    padding: 12px 40px;
    background-color: #766356;
    color: white;
    text-decoration: none;
    border: none;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
  }

  .home-button:hover {
    background-color: #665347;
  }
</style>
</head>

<body>
  <div class="background-text">Thank you</div>

  <div class="content">
    <p class="thank-you-text">お問い合わせありがとうございました</p>
    <a href="#" class="home-button">HOME</a>
  </div>
</body>

</html>