<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>FoundJob</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" />
	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#" />
</head>
<body data-instant-intensity="mousedown">
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
		<div class="container">
			<a class="navbar-brand" href="{{ route('home') }}">FoundJob</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
					</li>	
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('jobs') }}">Find Jobs</a>
					</li>	
          <li class="nav-item">
						<a class="nav-link" aria-current="page" href="about.html">About</a>
					</li>								
				</ul>		
        @if (!Auth::check())
          <a class="btn btn-outline-primary me-2" href="{{ route('account.login') }}" type="submit">Login</a>
          @else
          @if (Auth::user()->role == 'admin')
            <a class="btn btn-outline-primary me-2" href="{{ route('admin.dashboard') }}" type="submit">Admin</a>
          @endif
          <a class="btn btn-outline-primary me-2" href="{{ route('account.profile') }}" type="submit">Profile</a>
        @endif
				<a class="btn btn-primary" href="post-job.html" type="submit">Post a Job</a>
			</div>
		</div>
	</nav>
</header>

@yield('main')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="image"  name="image">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mx-3">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            
        </form>
      </div>
    </div>
  </div>
</div>

<div class="footer-area footer-bg footer-padding">
        <div class="container">
          <div class="row d-flex justify-content-between">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
              <div class="single-footer-caption mb-50">
                <div class="single-footer-caption mb-30">
                  <div class="footer-tittle">
                    <h4>About Us</h4>
                    <div class="footer-pera">
                      <p>
                        Heaven frucvitful doesn't cover lesser dvsays appear
                        creeping seasons so behold.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
              <div class="single-footer-caption mb-50">
                <div class="footer-tittle">
                  <h4>Contact Info</h4>
                  <ul>
                    <li>
                      <p>Address :Your address goes here, your demo address.</p>
                    </li>
                    <li><a href="#">Phone : +8880 44338899</a></li>
                    <li><a href="#">Email : info@colorlib.com</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
              <div class="single-footer-caption mb-50">
                <div class="footer-tittle">
                  <h4>Important Link</h4>
                  <ul>
                    <li><a href="#"> View Project</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Testimonial</a></li>
                    <li><a href="#">Proparties</a></li>
                    <li><a href="#">Support</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
              <div class="single-footer-caption mb-50">
                <div class="footer-tittle">
                  <h4>Newsletter</h4>
                  <div class="footer-pera footer-pera2">
                    <p>
                      Heaven fruitful doesn't over lesser in days. Appear
                      creeping.
                    </p>
                  </div>
                  <!-- Form -->
                  <div class="footer-form">
                    <div id="mc_embed_signup">
                      <form
                        target="_blank"
                        action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                        method="get"
                        class="subscribe_form relative mail_part"
                      >
                        <input
                          type="email"
                          name="email"
                          id="newsletter-form-email"
                          placeholder="Email Address"
                          class="placeholder hide-on-focus"
                          onfocus="this.placeholder = ''"
                          onblur="this.placeholder = ' Email Address '"
                        />
                        <div class="form-icon">
                          <button
                            type="submit"
                            name="submit"
                            id="newsletter-submit"
                            class="email_icon newsletter-submit button-contactForm"
                          >
                            <img src="assets/img/icon/form.png" alt="" />
                          </button>
                        </div>
                        <div class="mt-10 info"></div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--  -->
          <div class="row footer-wejed justify-content-between">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
              <!-- logo -->
              <div class="footer-logo mb-20">
                <a href="index.html"
                  ><img src="assets/img/logo/logo2_footer.png" alt=""
                /></a>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
<footer class="bg-dark py-3 bg-2">
<div class="container">
    <p class="text-center text-white pt-3 fw-bold fs-6">© 2023 xyz company, all right reserved</p>
</div>
</footer> 
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/lightbox.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
    $.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
});
</script>
@yield('customJs')
</body>
</html>