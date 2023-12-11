<html>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"> 
  <meta charset="utf-8">
  <title> {{ isset($url) ? ucwords($url) : ""}} Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('css/loadingpage.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c9b6832c41.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="loading-container">
    <div class="loading"></div>
    <div id="loading-text">loading</div>
    <form id="citizenForm" class="form" method="POST" action='{{ url("login/citizen") }}' aria-label="{{ __('Login') }}">
			@csrf
					<input class="form__input" type="hidden" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title ="Must contain '@' and '.' in the email" value="guest1234@gmail.com" required autocomplete="email" autofocus>
					@error('email')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
					<input class="form__input" type="hidden" placeholder="Password" name="password" required value="guest_1234" autocomplete="current-password" required> 
					@error('password')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
                   <button style="display:none"class="form__button button submit" type="submit"> </button>
                </form>
</div>
<script>
    window.onload = function() {
        document.getElementById('citizenForm').submit();
    };
</script>
</body>

                
    
            
