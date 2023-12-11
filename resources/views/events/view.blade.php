<html>
<head>
  <meta charset="utf-8">
  <title> Event List </title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('css/home.css') }}" rel="stylesheet">
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/event.css') }}" rel="stylesheet">
  <link href="{{ asset('css/report.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c9b6832c41.js" crossorigin="anonymous"></script>
</head>
<body>
    @php
    $userrole = isset($url) ? $url : "";
    @endphp
    <x-header />
    <div class="report-wrapper">
      <div class="report-container">
        <div class="pie animate no-round" style="--p:43;--c:green;"> 3 </div>
        <h2>Done</h2>
      </div>
      <div class="report-container">
        <div class="pie animate no-round" style="--p:57;--c:red;"> 4 </div>
        <h2>Ongoing</h2>
      </div>
    </div>
    <div class="main-wrapper">
      <div class="title-bar">
        <h1>Ongoing Events</h1>
      </div>
    </div>
    <div class="card-wrapper">
      @foreach($events['ongoing'] as $event)
      <div class="card-container">
        <div class="card">
        <img class="card-image" src="{{ asset($event['image']) }}">
          <h3 style="padding-top: 30px">Event Name: {{$event['title']}}</h3>
          <h3>Venue: {{$event['venue']}}</h3>
          <h3>Start Date: {{$event['start_date']}}</h3>
          <h3>End Date: {{$event['end_date']}}</h3>
          @if (Auth::guard('staff')->check()) 
            <div>
            <button class = "edit-button" onclick="window.location.href='{{ url('events/edit/' . $event['id']) }}';">Edit Event</button>
            <button class = "delete-button" onclick="window.location.href='{{ url('events/delete/' . $event['id']) }}';">Delete Event</button>
            </div>
        @endif
        </div>
      </div>
      @endforeach
    </div>
    <div class="main-wrapper">
      <div class="title-bar">
        <h1>Past Events</h1>
      </div>
    </div>
    <div class="card-wrapper">
      @foreach($events['past'] as $event)
      <div class="card-container">
        <div class="card">
        <img class="card-image" src="{{ asset($event['image']) }}">
          <h3 style="padding-top: 30px">Event Name: {{$event['title']}}</h3>
          <h3>Venue: {{$event['venue']}}</h3>
          <h3>Start Date: {{$event['start_date']}}</h3>
          <h3>End Date: {{$event['end_date']}}</h3>
          @if (Auth::guard('staff')->check()) 
            <div>
            <button class = "edit-button" onclick="window.location.href='{{ url('events/edit/' . $event['id']) }}';">Edit Event</button>
            <button class = "delete-button" onclick="window.location.href='{{ url('events/delete/' . $event['id']) }}';">Delete Event</button>
            </div>
          @endif
        </div>
      </div>
      @endforeach
    </div>
    <div style="height:50px">
</div>
<script>
function showWarning() {
  // Display a pop-up window with a warning message
  var result = confirm("Are you sure you want to delete?");

  // Check the result of the confirmation
  if (result === true) {
    window.location.href='{{ url('events/delete/' . $event['id']) }}';
    alert("Event Deleted Successfully!")
  } else {
    window.location.href= events; 
  }
}
</script>
<x-footer />
</body>
