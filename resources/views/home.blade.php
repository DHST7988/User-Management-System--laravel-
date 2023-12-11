<html>
<head>
  <meta charset="utf-8">
  <title> Home </title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('css/home.css') }}" rel="stylesheet">
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c9b6832c41.js" crossorigin="anonymous"></script>
</head>
<body>
    @php
    $userrole = isset($url) ? $url : "";
    @endphp
    <x-header />
    <div class="main-wrapper">
      <div class="title-bar">
        <h1>Public Cases</h1>
      </div>
    </div>
    <div class="card-wrapper">
    @foreach($cases as $case)
      <div class="card-container">
        <div class="card">
        <img class="card-image" src="{{ asset($case['image']) }}">
          <h3 style="padding-top: 30px">{{$case['title']}}</h3>
          <h3>Date: {{$case['date']}}</h3>
          <h3>{{$case['short_description']}}</h3>
          <a href="{{url('case')}}/{{$case['id']}}">Read More</a>
        </div>
      </div>
      @endforeach
    </div>
    <div class="read-more-container">
        <button class = "button-27" onclick="window.location.href='http://localhost:8000/cases';">More Cases</button>
      </div>
    <div class="main-wrapper">
      <div class="title-bar">
        <h1>Events</h1>
      </div>
    </div>
    <div class="card-wrapper">
      @foreach($events as $event)
      <div class="card-container">
        <div class="card">
        <img class="card-image" src="{{ asset($event['image']) }}">
          <h3 style="padding-top: 30px">Event Name: {{$event['title']}}</h3>
          <h3>Venue: {{$event['venue']}}</h3>
          <h3>Start Date: {{$event['start_date']}}</h3>
          <h3>End Date: {{$event['end_date']}}</h3>
        </div>
      </div>
      @endforeach
    </div>
    <div class="read-more-container">
        <button class = "button-27" onclick="window.location.href='http://localhost:8000/events';">More Events</button>
      </div>
    <div class="main-wrapper">
      <div class="title-bar">
        <h1>Projects</h1>
      </div>
    </div>
    <div class="card-wrapper">
    @foreach($projects as $project)
      <div class="card-container">
        <div class="card">
        <img class="card-image" src="{{ asset($project['image']) }}">
          <h3 style="padding-top: 30px">{{$project['title']}}</h3>
          <h3>Date: {{$project['date']}}</h3>
          <h3>{{$project['short_description']}}</h3>
          <a href="{{url('projects')}}/{{$project['id']}}">Read More</a>
        </div>
      </div>
      @endforeach
    </div>
    <div class="read-more-container">
        <button class = "button-27" onclick="window.location.href='http://localhost:8000/projects';">More Projects</button>
      </div>
    <div style="height:50px">
    <x-footer />
</body>
