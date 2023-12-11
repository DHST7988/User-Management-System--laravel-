<html>
<head>
  <meta charset="utf-8">
  <title> Contact Us</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/home.css') }}" rel="stylesheet">
  <link href="{{ asset('css/contact_us.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c9b6832c41.js" crossorigin="anonymous"></script>
</head>
<body>
    <x-header />
    <div style="height:30px">
    </div>
    <div class="main-wrapper">
      <div class="title-bar">
        <h1>Contact Us</h1>
      </div>
    </div>
    <div class="main-wrapper contact-us">
      <div class="title-bar">
        <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.7848324199863!2d114.03398097365904!3d4.451086643773659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x321f4f10ae6c4b25%3A0xef791ae1c2997d8!2zU1VQUCBTRU5BRElOIEJSQU5DSCDlj7LnurPmsYDmlK_pg6g!5e0!3m2!1sen!2smy!4v1690771903712!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <hr>
        <div class="contact-form-col">
        <h2>Any Enquiries Or Complaint? Kindly Let Us Know Through Contact Form Below!</h2>
        <form class="form" method="post" action='mailto:enquiry1234@gmail.com?subject=Contact%20Us%20Form' enctype="text/plain"> 
			  @csrf   

            <input class="form__input" type="text" placeholder="Name" name="Name" required>

					  <input class="form__input" type="text" placeholder="Email" name="Email" required>

            <input class="form__input" type="text" placeholder="Subject" name="Subject" required>

            <textarea class="form__input" type="text" placeholder="Description" name="Description" required></textarea> 
                    
					  <button class="form__button button submit" type="submit">Send</button>
          </form>
        </div>
      </div>
    </div>
    <div style="height:50px">
</div>
    <x-footer />
</body>
