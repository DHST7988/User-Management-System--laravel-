<html>
<head>
  <meta charset="utf-8">
  <title> Member Dashboard </title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c9b6832c41.js" crossorigin="anonymous"></script>
</head>
<body>
<x-header />
<div class="main-content">
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ asset('storage/user-placeholder.jpg') }}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="text-center">
                <h3>
                {{$data['name']}}<span class="font-weight-light">, 22</span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Malaysia
                </div>
                <hr class="my-4">
                <p>You are never too old to set another goal or dream a new dream.</p>

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My Account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href='{{ url('members/edit/' . $data['id']) }}' class="btn btn-sm btn-primary">Edit Profile</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Name</label>
                        <h4>{{$data['name']}}</h4>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <h4>{{$data['email']}}</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Member Benefits</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                      <div class="container">
                      <div class="item">
                        <div class="item-right">
                        <span class="up-border"></span>
                        <span class="down-border"></span>
                        </div> <!-- end item-right -->
                        
                        <div class="item-left">
                        <p class="event">Food Voucher</p>
                        <h2 class="title">KFC 10% Discount</h2>
                        
                        <div class="sce">
                            <div class="icon">
                            <i class="fa fa-table"></i>
                            </div>
                            <p>Expired: 31 August 2023 </p>
                        </div>
                        <div class="fix"></div>
                        <div class="loc">
                            <div class="icon">
                            <i class="fa fa-map-marker"></i>
                            </div>
                            <p style="margin-left: 5px">Every KFC Branch</p>
                        </div>
                        <div class="fix"></div>
                        <button class = "collect-button" >Collect</button>
                        </div> <!-- end item-right -->
                    </div> <!-- end item -->
                    </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div style="height:50px">
</div>
<x-footer />
</body>
