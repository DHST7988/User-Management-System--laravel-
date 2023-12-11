<html>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"> 
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('/css/header.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c9b6832c41.js" crossorigin="anonymous"></script>
</head>
<body>
    @if (Auth::guard('staff')->check()) 
    <div class="header">
        <div class="logo-wrapper">
            <img class="logo" src="{{ asset('storage/logo.png') }}" alt="logo">
        </div>
        <div class="nav-wrapper">
            <ul class="nav">
                <li><a href="/home/staff">Home</a></li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn">Member <i class="fa-solid fa-caret-down"></i></button>
                        <div class="dropdown-content">
                            <a href="/register/member">Create Member</a>
                            <a href="/member">Member List</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                <div class="dropdown">
                        <button class="dropbtn">Public Case <i class="fa-solid fa-caret-down"></i></button>
                        <div class="dropdown-content">
                            <a href="/cases">Public Case List</a>
                            <a href="/cases/createform">Create Public Case</a>
                        </div>
                    </div>
                </li>
                <li>
                <div class="dropdown">
                        <button class="dropbtn">Event <i class="fa-solid fa-caret-down"></i></button>
                        <div class="dropdown-content">
                            <a href="/events">Events List</a>
                            <a href="/events/create">Create Event</a>
                        </div>
                    </div>
                </li>
                <li>
                <div class="dropdown">
                        <button class="dropbtn">Project <i class="fa-solid fa-caret-down"></i></button>
                        <div class="dropdown-content">
                            <a href="/projects">Project List</a>
                            <a href="/projects/create">Create Project</a>
                        </div>
                    </div>
                </li>
                <li>
                <div class="dropdown">
                        <button class="dropbtn">More <i class="fa-solid fa-caret-down"></i></button>
                        <div class="dropdown-content">
                            <a href="/bob">Showcase Board of Branch Party</a>
                            <a href="/adun">ADUN YB Profile</a>
                            <a href="/contact_us">Contact Us</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="header-button button--mimas"><span>Staff <i class="fa-solid fa-caret-down"></i></span></button>
                <div class="dropdown-content">
                    <a href="/leave">Apply Leave</a>
                    <a href="/logout">Logout</a>
                </div>
        </div>
    </div>
    @elseif (Auth::guard('member')->check()) 
    <div class="header">
        <div class="logo-wrapper">
            <img class = "logo" src="{{ asset('storage/logo.png') }}" alt="logo">
        </div>
        <div class="nav-wrapper">
            <ul class="nav">
                <li><a href="/home/member">Home</a></li>
                <li><a href="/cases">Public Case</a></li>
                <li><a href="/events">Event</a></li> 
                <li><a href="/projects">Project</a></li>
                <li>
                <div class="dropdown">
                        <button class="dropbtn">More <i class="fa-solid fa-caret-down"></i></button>
                        <div class="dropdown-content">
                            <a href="/bob">Showcase Board of Branch Party</a>
                            <a href="/adun">ADUN YB Profile</a>
                            <a href="/contact_us">Contact Us</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="header-button button--mimas"><span>Member <i class="fa-solid fa-caret-down"></i></span></button>
                <div class="dropdown-content">
                    <a href="/dashboard">Dashboard</a>
                    <a href="/logout">Logout</a>
                </div>
        </div>
    </div>
    @else
    <div class="header">
        <div class="logo-wrapper">
            <img class = "logo" src="{{ asset('storage/logo.png') }}" alt="logo">
        </div>
        <div class="nav-wrapper">
            <ul class="nav">
                <li><a href="/home/citizen">Home</a></li>
                <li><a href="/cases">Public Case</a></li>
                <li><a href="/events">Event</a></li> 
                <li><a href="/projects">Project</a></li>
                <li>
                <div class="dropdown">
                        <button class="dropbtn">More <i class="fa-solid fa-caret-down"></i></button>
                        <div class="dropdown-content">
                            <a href="/bob">Showcase Board of Branch Party</a>
                            <a href="/adun">ADUN YB Profile</a>
                            <a href="/contact_us">Contact Us</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="header-button button--mimas"><span>Public<i class="fa-solid fa-caret-down"></i></span></button>
                <div class="dropdown-content">
                    <a href="/logout">Logout</a>
                </div>
        </div>
    </div>
    @endif
</body>