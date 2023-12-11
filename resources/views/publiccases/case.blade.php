<html>
<head>
  <meta charset="utf-8">
  <title> {{$data['title']}}</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/case.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c9b6832c41.js" crossorigin="anonymous"></script>
</head>
<body>
    @php
    $userrole = isset($url) ? $url : "";
    @endphp
    <x-header />
    <div style="height:30px">
    </div>
    <div class="main-wrapper">
      <div class="title-bar">
        <h1>{{$data['title']}}</h1>
        <h3>{{$data['date']}}</h1>
        <img class="card-image" src="{{ asset($data['image']) }}">
        <hr>
        <p>{!! nl2br(e($data['description'])) !!}</p>

      </div>
    </div>
    <div style="height:30px">
    </div>
    <x-footer />
</body>
