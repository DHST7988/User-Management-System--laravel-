<html>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"> 
  <meta charset="utf-8">
  <title> Apply Leave</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('css/userAuth.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c9b6832c41.js" crossorigin="anonymous"></script>
</head>
<body>
<x-header />
    <div class="main-wrapper">
    <div class="main">
        <div class="reg_container">
            <i style="font-size: 66px" class="fa-regular fa-circle-user"></i>
        </div>
        <h1 style="text-align: center;padding-top:30px;">Apply Leave</h1>
        <div class="container form-container">
			<form class="form" action="mailto:enquiry1234@gmail.com?subject=Contact%20Us%20Form" method="post" enctype="text/plain"> 
			@csrf
					<input class="form__input" type="hidden" name="name" value="{{ Auth::user()->name }}" required>
                    <input class="form__input" type="hidden" name="email" value="{{ Auth::user()->email }}" required>
                    <input class="form__input" type="text" placeholder="Start Date" name="start_date" required>
					@error('title')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
					<input class="form__input" type="text" placeholder="End Date" name="end_date" required>
					@error('date')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
                    <textarea class="form__input" type="text" placeholder="Reason To Apply Leave" name="reason" required></textarea> 
					@error('reason')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
					<button class="form__button button submit" type="submit">Apply</button>
                </form>
            </div>
    	</div>
	</div>
	<script src="https://smtpjs.com/v3/smtp.js"></script>
	<script>
		function.sendEmail(){
			Email.send({
				Host:"smtp.gmail.com",
				Username: "daniel06074731@gmail.com",
				Password: "qbjhlpsbzsqygrgw",
				To : "hwong055@gmail.com",
				From: document.getElementById("email").value,
				Subject: "Apply Leave"
				Body: "Name: " + document.getElementById("name").value
				+ "<br> Email: " + document.getElementById("email").value
				+ "<br> Date: " + document.getElementById("start_date").value + " to " + document.getElementById("end_date").value
				+ "<br> Reason: " + document.getElementById("reason").value
			}).then(
				message => alert(message)
			);
		}
	</script>
	  <div style="height:50px">
	<x-footer />
</body>