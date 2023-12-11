<html>
<head>
  <meta charset="utf-8">
  <title> Member List </title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('css/home.css') }}" rel="stylesheet">
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/member.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c9b6832c41.js" crossorigin="anonymous"></script>
</head>
<body>
<x-header />
<section>
  <!--for demo wrap-->
  <h1>Member List</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        @foreach($members as $member)
        <tr>
          <td>{{$member['id']}}</td>
          <td>{{$member['name']}} </td>
          <td>{{$member['email']}}</td>
          <td>************</td>
          <td>
            <div>
                <button class = "edit-button" onclick="window.location.href='{{ url('members/edit/' . $member['id']) }}';">Edit</button>
                <button class = "delete-button" onclick="showWarning()">Delete</button>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
<script>
function showWarning() {
  // Display a pop-up window with a warning message
  var result = confirm("Are you sure you want to delete?");

  // Check the result of the confirmation
  if (result === true) {
    window.location.href='{{ url('members/delete/' . $member['id']) }}';
    alert("Member Deleted Successfully!")
  } else {
    window.location.href = cases; 
  }
}
</script>
<x-footer />
</body>
