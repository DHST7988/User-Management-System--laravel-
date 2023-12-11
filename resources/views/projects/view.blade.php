<html>
<head>
  <meta charset="utf-8">
  <title> Project List </title>
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
        <div class="pie animate no-round" style="--p:70;--c:green;"> 7 </div>
        <h2>Done</h2>
      </div>
      <div class="report-container">
        <div class="pie animate no-round" style="--p:30;--c:red;"> 3 </div>
        <h2>Ongoing</h2>
      </div>
    </div>
    <div class="main-wrapper">
      <div class="title-bar">
        <h1>On Going Projects</h1>
      </div>
    </div>
    <div class="card-wrapper">
      @foreach($projects['ongoing'] as $project)
      <div class="card-container">
        <div class="card">
        <img class="card-image" src="{{ asset($project['image']) }}">
          <h3 style="padding-top: 30px">{{$project['title']}}</h3>
          <h3>Author: {{$project['author']}}</h3>
          <h3>{{$project['short_description']}}</h3>
          <a href="{{url('project')}}/{{$project['id']}}">Read More</a>
          @if (Auth::guard('staff')->check()) 
            <div style="margin-top: 20px">
            <button class = "edit-button" onclick="window.location.href='{{ url('projects/edit/' . $project['id']) }}';">Edit Project</button>
            <button class = "delete-button" onclick="showWarning()" >Delete Project</button>
            </div>
        @endif
        </div>
      </div>
      @endforeach
    </div>
    </div>
    <div style="height:50px">
</div>
<script>
function showWarning() {
  // Display a pop-up window with a warning message
  var result = confirm("Are you sure you want to delete?");

  // Check the result of the confirmation
  if (result === true) {
    window.location.href='{{ url('projects/delete/' . $project['id']) }}';
    alert("Project Deleted Successfully!")
  } else {
    window.location.href= projects; 
  }
}
</script>
<x-footer />
</body>
