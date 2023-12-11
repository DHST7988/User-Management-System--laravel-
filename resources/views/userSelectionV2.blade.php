<html>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"> 
  <meta charset="utf-8">
  <title>Welcome</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('css/userAuth.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c9b6832c41.js" crossorigin="anonymous"></script>
<style>

.container.form-container{
    left: 100px;
}
.main{
  width:1000px;
}
.container{
  height: 100%;
  width: 800px;
}
a{
  color: #ecf0f300;
}
</style>
</head>
<body>
<div class="main-wrapper">
        <div class="main">
            <div class="container form-container">
            <div class="inner-container">
        <h1 >Select User Type</h1>
        <a href="http://localhost:8000/login/staff">
        <div class="icon-box">
          <div class="icon">
            <span class="icon-span">
              <i class="fa-solid fa-users-rectangle"></i>
            </span>
          </div>
          <div class="text">
            <h3>Staff</h3>
          </div>
        </div>
        </a>
        <a href="http://localhost:8000/login/member">
        <div class="icon-box" id="icon-box-2">
          <div class="icon">
            <span class="icon-span">
            <i class="fa-solid fa-people-group"></i>
            </span>
          </div>
          <div class="text">
            <h3>Member</h3>
          </div>
        </div>
        </a>
        <a href="http://localhost:8000/login/citizen">
        <div class="icon-box" id="icon-box-2">
          <div class="icon">
            <span class="icon-span">
            <i class="fa-solid fa-users"></i>
            </span>
          </div>
          <div class="text">
            <h3>Public</h3>
          </div>
        </div>
        </a>
        </div>
            </div>
		</div>
</div>
<x-footer />
</body>

                
    
            
