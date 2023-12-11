<html>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"> 
  <meta charset="utf-8">
  <title> Edit Events</title>
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
        <h1 style="text-align: center;padding-top:30px;">Edit Events</h1>
        <div class="container form-container">
			<form class="form" method="post" action="{{url('/events/edit')}}/{{$data['id']}}" enctype="multipart/form-data">
			@csrf
                    <input class="form__input" type="text" placeholder="Title" name="title" value="{{$data['title']}}" required>
					@error('title')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
					<input class="form__input" type="text" placeholder="Venue" name="venue" value="{{$data['venue']}}" required>
					@error('venue')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
					<input class="form__input" type="text" placeholder="Start Date" name="start_date" value="{{$data['start_date']}}" required> 
					@error('start_date')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
                    <input class="form__input" type="text" placeholder="End Date" name="end_date" value="{{$data['end_date']}}" required> 
					@error('end_date')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
                    <select id="status" name="status" value="{{$data['status']}}">
                        <option value="ongoing">On Going</option>
                        <option value="past">Past Events</option>
                    </select>
                    <input class="form__input" type="file" id="image" name="image">
					<button class="form__button button submit" type="submit">Edit</button>
                </form>
            </div>
    	</div>
	</div>
	<x-footer />
</body>