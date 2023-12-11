<html>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"> 
  <meta charset="utf-8">
  <title> Edit Projects</title>
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
        <h1 style="text-align: center;padding-top:30px;">Edit Projects</h1>
        <div class="container form-container">
		<form class="form" method="post" action="{{url('/projects/edit')}}/{{$data['id']}}" enctype="multipart/form-data"> 
			@csrf
                    <input class="form__input" type="text" placeholder="Title" name="title" value="{{$data['title']}}" required>
					@error('title')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
					<input class="form__input" type="text" placeholder="Author" name="author" value="{{$data['author']}}" required>
					@error('date')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
					<input class="form__input" type="text" placeholder="Short Description" name="short_description" value="{{$data['short_description']}}" required> 
					@error('short_description')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
                    <textarea class="form__input" type="text" placeholder="Description" name="description" required>{{$data['description']}}</textarea>
					@error('description')
						<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
						</span>
					@enderror
                    <select id="status" name="status" value="{{$data['status']}}">
                        <option value="ongoing">On Going</option>
                        <option value="past">Past Projects</option>
                    </select>
                    <input class="form__input" type="file" id="image" name="image">
                    
					<button class="form__button button submit" style="margin-top: 23px" type="submit">Create</button>
                </form>
            </div>
    	</div>
	</div>
	<x-footer />
</body>