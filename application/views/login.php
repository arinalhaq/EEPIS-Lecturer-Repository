<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Design System for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title>Log In</title>
	<!-- Favicon -->
	<link href="<?php //echo base_url('assets/public/assets/img/brand/favicon.png') ?>" rel="icon" type="image/png">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Icons -->
	<link href="<?php echo base_url('assets/public/assets/vendor/nucleo/css/nucleo.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/public/assets/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
	<!-- Argon CSS -->
	<link type="text/css" href="<?php echo base_url('assets/public/assets/css/argon.css?v=1.0.1') ?>" rel="stylesheet">
	<!-- Docs CSS -->
	<link type="text/css" href="<?php echo base_url('assets/public/assets/css/docs.min.css') ?>" rel="stylesheet">
</head>

<body class="animsition">
	<header class="header-global">
		<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
			<div class="container">
				<a style="width:200px;" href="../index.html">
					<img style="width:200px;" src="<?php echo base_url('assets/public/assets/img/brand/logo.png') ?>">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global"
				 aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse collapse" id="navbar_global">
					<div class="navbar-collapse-header">
						<div class="row">
							<div class="col-6 collapse-brand">
								<a href="../index.html">
									<img src="<?php echo base_url('assets/public/assets/img/brand/blue.png') ?>">
								</a>
							</div>
							<div class="col-6 collapse-close">
								<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global"
								 aria-expanded="false" aria-label="Toggle navigation">
									<span></span>
									<span></span>
								</button>
							</div>
						</div>
					</div>
					<ul class="navbar-nav align-items-lg-center ml-lg-auto">
						<li class="nav-item d-none d-lg-block ml-lg-4">
							<a href="<?php echo base_url('login')?>" target="_blank" class="btn btn-neutral btn-icon">
								<span class="btn-inner--icon">

								</span>
								<span class="nav-link-inner--text">LOG IN</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<main>
		<section class="section section-shaped section-lg">
			<div class="shape shape-style-1 bg-gradient-default">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="container pt-lg-md">
				<div class="row justify-content-center">
					<div class="col-lg-5">
						<div class="card bg-secondary shadow border-0">
							
							<div class="card-body px-lg-5 py-lg-5">
								<div class="text-center text-muted mb-4">
									<small>Sign In</small>
								</div>
								<form role="form" action="<?php echo base_url()?>login/auth" method="post">
									<div class="form-group mb-3">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<span class="input-group-text"></span>
											</div>
											<input class="form-control" placeholder="NIK" type="text" name="id">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
											</div>
											<input class="form-control" placeholder="Password" type="password" name="password">
										</div>
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-primary my-4">Sign in</button>
									</div>
								</form>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-6">
								<a href="#" class="text-light">
									<small>Forgot password?</small>
								</a>
							</div>
							<div class="col-6 text-right">
								<a href="#" class="text-light">
									<small>Create new account</small>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	
	</div>
	</div>
	</div>
	</div>

	</div>

	<!-- Jquery JS-->
	<script src="vendor/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap JS-->
	<script src="vendor/bootstrap-4.1/popper.min.js"></script>
	<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
	<!-- Vendor JS       -->
	<script src="vendor/slick/slick.min.js">
	</script>
	<script src="vendor/wow/wow.min.js"></script>
	<script src="vendor/animsition/animsition.min.js"></script>
	<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
	</script>
	<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendor/counter-up/jquery.counterup.min.js">
	</script>
	<script src="vendor/circle-progress/circle-progress.min.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="vendor/chartjs/Chart.bundle.min.js"></script>
	<script src="vendor/select2/select2.min.js">
	</script>

	<!-- Main JS-->
	<script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
