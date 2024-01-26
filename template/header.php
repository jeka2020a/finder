<?php session_start();?>
<!DOCTYPE html>
<html lang="<?= $lang;?>">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?=htmlentities($data['meta_title']);?></title>
	<meta name="description" content="Finder - Directory &amp; Listings Bootstrap Template">
    <meta name="keywords" content="bootstrap, business, directory, listings, e-commerce, car dealer, city guide, real estate, job board, user account, multipurpose, ui kit, html5, css3, javascript, gallery, slider, touch">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#5bbad5" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap"/>
	<link rel="stylesheet" href="/assets/css/simplebar.min.css">
	<link rel="stylesheet" href="/assets/css/nouslider.min.css">
	<link rel="stylesheet" href="/assets/css/tiny-slider.css">
	<link rel="stylesheet" href="/assets/css/theme.min.css">
	<link rel="stylesheet" href="/assets/css/flatpickr.min.css">
	<link rel="stylesheet" href="/assets/css/lightgallery-bundle.min.css">





    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="/assets/css/main.min.css">
	<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com"/>
	<link rel="dns-prefetch" href="https://fonts.gstatic.com"/>
	<link rel="preconnect" href="https://cdnjs.cloudflare.com"/>
	<link rel="preconnect" href="https://fonts.gstatic.com"/>

	
	<!-- Main CSS File -->
	
</head>
<body style="padding-top:20px;">
	<!-- Demo switcher (offcanvas)-->
	<button class="btn btn-icon btn-light rounded-circle shadow position-fixed top-50 end-0 translate-middle-y me-3" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Choose Demo" style="z-index: 1035;"><span class="d-flex align-items-center justify-content-center position-absolute top-0 start-0 w-100 h-100 rounded-circle" data-bs-toggle="offcanvas" data-bs-target="#demo-switcher"><i class="fi-layers"></i></span></button>
	<div class="offcanvas offcanvas-end" id="demo-switcher">
	<div class="offcanvas-header d-block border-bottom">
		<div class="d-flex align-items-center justify-content-between mb-4">
		<h2 class="h5 mb-0">Choose Demo</h2>
		<button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
		</div>
		<div class="d-flex"><a class="btn btn-outline-secondary btn-sm w-100 me-2" href="index.html"><i class="fi-home me-2"></i>Main Page</a><a class="btn btn-outline-secondary btn-sm w-100" href="components/typography.html"><i class="fi-file me-2"></i>Docs / UI Kit</a></div>
	</div>
	<div class="offcanvas-body">
		<div class="card card-hover shadow-sm mb-4"><img class="card-img-top" src="img/intro/demos/offcanvas/car-finder.jpg" alt="Car Finder Demo">
		<div class="card-body p-3">
			<h3 class="fs-base card-title text-center"><a class="nav-link stretched-link" href="car-finder-home.html">Car Finder Demo</a></h3>
		</div>
		</div>
		<div class="card card-hover shadow-sm mb-4"><img class="card-img-top" src="img/intro/demos/offcanvas/real-estate.jpg" alt="Real Estate Demo">
		<div class="card-body p-3">
			<h3 class="fs-base card-title text-center"><a class="nav-link stretched-link" href="real-estate-home-v1.html">Real Estate Demo</a></h3>
		</div>
		</div>
		<div class="card card-hover shadow-sm mb-4"><img class="card-img-top" src="img/intro/demos/offcanvas/job-board.jpg" alt="Job Board Demo">
		<div class="card-body p-3">
			<h3 class="fs-base card-title text-center"><a class="nav-link stretched-link" href="job-board-home-v1.html">Job Board Demo</a></h3>
		</div>
		</div>
		<div class="card card-hover shadow-sm mb-4"><img class="card-img-top" src="img/intro/demos/offcanvas/city-guide.jpg" alt="City Guide Demo">
		<div class="card-body p-3">
			<h3 class="fs-base card-title text-center"><a class="nav-link stretched-link" href="city-guide-home-v1.html">City Guide Demo</a></h3>
		</div>
		</div>
	</div>
	<div class="offcanvas-header border-top"><a class="btn btn-primary btn-lg w-100" href="https://themes.getbootstrap.com/product/finder-directory-listings-template-ui-kit/" target="_blank" rel="noopener"><i class="fi-cart fs-lg me-2"></i>Buy Finder</a></div>
	</div>
	<main class="page-wrapper">
	<!-- Sign In Modal-->
	<div class="modal fade" id="signin-modal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
		<div class="modal-content">
			<div class="modal-body px-0 py-2 py-sm-0">
			<button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal"></button>
			<div class="row mx-0 align-items-center">
				<div class="col-md-6 border-end-md p-4 p-sm-5">
				<h2 class="h3 mb-4 mb-sm-5">Hey there!<br>Welcome back.</h2><img class="d-block mx-auto" src="img/signin-modal/signin.svg" width="344" alt="Illustartion">
				<div class="mt-4 mt-sm-5">Don't have an account? <a href="#signup-modal" data-bs-toggle="modal" data-bs-dismiss="modal">Sign up here</a></div>
				</div>
				<div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5"><a class="btn btn-outline-info w-100 mb-3" href="#"><i class="fi-google fs-lg me-1"></i>Sign in with Google</a><a class="btn btn-outline-info w-100 mb-3" href="#"><i class="fi-facebook fs-lg me-1"></i>Sign in with Facebook</a>
				<div class="d-flex align-items-center py-3 mb-3">
					<hr class="w-100">
					<div class="px-3">Or</div>
					<hr class="w-100">
				</div>
				<form class="needs-validation" novalidate>
					<div class="mb-4">
					<label class="form-label mb-2" for="signin-email">Email address</label>
					<input class="form-control" type="email" id="signin-email" placeholder="Enter your email" required>
					</div>
					<div class="mb-4">
					<div class="d-flex align-items-center justify-content-between mb-2">
						<label class="form-label mb-0" for="signin-password">Password</label><a class="fs-sm" href="#">Forgot password?</a>
					</div>
					<div class="password-toggle">
						<input class="form-control" type="password" id="signin-password" placeholder="Enter password" required>
						<label class="password-toggle-btn" aria-label="Show/hide password">
						<input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
						</label>
					</div>
					</div>
					<button class="btn btn-primary btn-lg w-100" type="submit">Sign in         </button>
				</form>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>

		<!-- Sign Up Modal-->
	<div class="modal fade" id="signup-modal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
			<div class="modal-content">
				<div class="modal-body px-0 py-2 py-sm-0">
					<button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal"></button>
					<div class="row mx-0 align-items-center">
						<div class="col-md-6 border-end-md p-4 p-sm-5">
							<h2 class="h3 mb-4 mb-sm-5">Join Finder.<br>Get premium benefits:</h2>
							<ul class="list-unstyled mb-4 mb-sm-5">
								<li class="d-flex mb-2"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Add and promote your listings</span></li>
								<li class="d-flex mb-2"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Easily manage your wishlist</span></li>
								<li class="d-flex mb-0"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Leave reviews</span></li>
							</ul><img class="d-block mx-auto" src="img/signin-modal/signup.svg" width="344" alt="Illustartion">
							<div class="mt-sm-4 pt-md-3">Already have an account? <a href="#signin-modal" data-bs-toggle="modal" data-bs-dismiss="modal">Sign in</a></div>
							</div>
							<div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5"><a class="btn btn-outline-info w-100 mb-3" href="#"><i class="fi-google fs-lg me-1"></i>Sign in with Google</a><a class="btn btn-outline-info w-100 mb-3" href="#"><i class="fi-facebook fs-lg me-1"></i>Sign in with Facebook</a>
								<div class="d-flex align-items-center py-3 mb-3">
									<hr class="w-100">
									<div class="px-3">Or</div>
									<hr class="w-100">
								</div>
								<form class="needs-validation" novalidate>
									<div class="mb-4">
										<label class="form-label" for="signup-name">Full name</label>
										<input class="form-control" type="text" id="signup-name" placeholder="Enter your full name" required>
									</div>
									<div class="mb-4">
										<label class="form-label" for="signup-email">Email address</label>
										<input class="form-control" type="email" id="signup-email" placeholder="Enter your email" required>
									</div>
									<div class="mb-4">
										<label class="form-label" for="signup-password">Password <span class='fs-sm text-muted'>min. 8 char</span></label>
										<div class="password-toggle">
											<input class="form-control" type="password" id="signup-password" minlength="8" required>
											<label class="password-toggle-btn" aria-label="Show/hide password">
											<input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
											</label>
										</div>
									</div>
									<div class="mb-4">
										<label class="form-label" for="signup-password-confirm">Confirm password</label>
										<div class="password-toggle">
											<input class="form-control" type="password" id="signup-password-confirm" minlength="8" required>
											<label class="password-toggle-btn" aria-label="Show/hide password">
											<input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
											</label>
										</div>
									</div>
									<div class="form-check mb-4">
										<input class="form-check-input" type="checkbox" id="agree-to-terms" required>
										<label class="form-check-label" for="agree-to-terms">By joining, I agree to the <a href='#'>Terms of use</a> and <a href='#'>Privacy policy</a></label>
									</div>
									<button class="btn btn-primary btn-lg w-100" type="submit">Sign up         </button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>

		<!-- Navbar-->
	<header class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-scroll-header style="margin-bottom: 50px;">
		<div class="container"><a class="navbar-brand me-3 me-xl-4" href="real-estate-home-v1.html"><img class="d-block" src="/assets/images/logo-dark.svg" width="116" alt="Finder"></a>
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button><a class="btn btn-sm text-primary d-none d-lg-block order-lg-3" href="#signin-modal" data-bs-toggle="modal"><i class="fi-user me-2"></i>Sign in</a><a class="btn btn-primary btn-sm ms-2 order-lg-3" href="tel: 0 (800) 33 26 38"><span class='d-none d-sm-inline'>0 (800) 33 26 38</span></a>
			<div class="collapse navbar-collapse order-lg-2" id="navbarNav">
				<ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">
					<!-- Demos switcher-->
					<li class="nav-item dropdown me-lg-2"><a class="nav-link dropdown-toggle align-items-center pe-lg-4" href="#" data-bs-toggle="dropdown" role="button" aria-expanded="false"><i class="fi-layers me-2"></i>Demos<span class="d-none d-lg-block position-absolute top-50 end-0 translate-middle-y border-end" style="width: 1px; height: 30px;"></span></a>
						<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="/teplyy-pol/mat/nexans_millimat.html"><i class="fi-building fs-base opacity-50 me-2"></i>Real Estate Demo</a></li>
						<li class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="car-finder-home.html"><i class="fi-car fs-base opacity-50 me-2"></i>Car Finder Demo</a></li>
						<li class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="job-board-home-v1.html"><i class="fi-briefcase fs-base opacity-50 me-2"></i>Job Board Demo</a></li>
						<li class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="city-guide-home-v1.html"><i class="fi-map-pin fs-base opacity-50 me-2"></i>City Guide Demo</a></li>
						<li class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="index.html"><i class="fi-home fs-base opacity-50 me-2"></i>Main Page</a></li>
						<li><a class="dropdown-item" href="components/typography.html"><i class="fi-list fs-base opacity-50 me-2"></i>Components</a></li>
						<li><a class="dropdown-item" href="docs/dev-setup.html"><i class="fi-file fs-base opacity-50 me-2"></i>Documentation</a></li>
						</ul>
					</li>
					<!-- Menu items--><!--a class="nav-link dropdown-toggle"  role="button"  data-bs-toggle="dropdown" aria-expanded="false"-->
					<li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="#" role="button"  data-bs-toggle="dropdown" aria-expanded="false">Home</a>
						<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="real-estate-home-v1.html">Home v.1</a></li>
						<li><a class="dropdown-item" href="real-estate-home-v2.html">Home v.2</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="/teplyy-pol.html"  >Catalog</a>
						<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="real-estate-catalog-rent.html">Property for Rent</a></li>
						<li><a class="dropdown-item" href="real-estate-catalog-sale.html">Property for Sale</a></li>
						<li><a class="dropdown-item" href="real-estate-single-v1.html">Single Property v.1</a></li>
						<li><a class="dropdown-item" href="real-estate-single-v2.html">Single Property v.2</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
						<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="real-estate-account-info.html">Personal Info</a></li>
						<li><a class="dropdown-item" href="real-estate-account-security.html">Password &amp; Security</a></li>
						<li><a class="dropdown-item" href="real-estate-account-properties.html">My Properties</a></li>
						<li><a class="dropdown-item" href="real-estate-account-wishlist.html">Wishlist</a></li>
						<li><a class="dropdown-item" href="real-estate-account-reviews.html">Reviews</a></li>
						<li><a class="dropdown-item" href="real-estate-account-notifications.html">Notifications</a></li>
						<li><a class="dropdown-item" href="signin-light.html">Sign In</a></li>
						<li><a class="dropdown-item" href="signup-light.html">Sign Up</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Vendor</a>
						<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="real-estate-add-property.html">Add Property</a></li>
						<li><a class="dropdown-item" href="real-estate-property-promotion.html">Property Promotion</a></li>
						<li><a class="dropdown-item" href="real-estate-vendor-properties.html">Vendor Page: Properties</a></li>
						<li><a class="dropdown-item" href="real-estate-vendor-reviews.html">Vendor Page: Reviews</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
						<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="real-estate-about.html">About</a></li>
						<li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
							<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="real-estate-blog.html">Blog Grid</a></li>
							<li><a class="dropdown-item" href="real-estate-blog-single.html">Single Post</a></li>
							</ul>
						</li>
						<li><a class="dropdown-item" href="real-estate-contacts.html">Contacts</a></li>
						<li><a class="dropdown-item" href="real-estate-help-center.html">Help Center</a></li>
						<li><a class="dropdown-item" href="real-estate-404.html">404 Not Found</a></li>
						</ul>
					</li>
					<li class="nav-item d-lg-none"><a class="nav-link" href="#signin-modal" data-bs-toggle="modal"><i class="fi-user me-2"></i>Sign in</a></li>
				</ul>
			</div>
		</div>
	</header>
