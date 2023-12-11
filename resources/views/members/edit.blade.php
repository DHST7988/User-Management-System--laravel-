<html>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"> 
  <meta charset="utf-8">
  <title> Edit Members</title>
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
        <h1 style="text-align: center;padding-top:30px;">Edit Member</h1>
        <div class="container form-container">
		<form class="form" method="post" action="{{url('/members/edit')}}/{{$data['id']}}" enctype="multipart/form-data"> 
		@csrf
                    <input class="form__input" type="text" placeholder="Name" name="name" value="{{$data['name']}}" required>
					@error('name')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
					<input class="form__input" type="text" placeholder="Email" name="email" value="{{$data['email']}}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title ="Must contain '@' and '.' in the email" required>
					@error('email')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
					<input class="form__input" type="password" placeholder="Password" name="password" required> 
					@error('password')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
					<input class="form__input" type="password" placeholder="Confirm Password" name="password_confirmation" required> 
					<button class="form__button button submit" type="submit">Edit</button>
                </form>
            </div>
    	</div>
	</div>
	<x-footer />
</body>