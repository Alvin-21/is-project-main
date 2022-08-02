<?php

session_start();

include('process.php')

?>
<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Title Page-->
	<title>CMS | Registration</title>

	<!-- Fontfaces CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha512-rRQtF4V2wtAvXsou4iUAs2kXHi3Lj9NE7xJR77DE7GHsxgY9RTWy93dzMXgDIG8ToiRTD45VsDNdTiUagOFeZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Vendor CSS-->
	<link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
	<link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">

	<!-- Main CSS-->
	<style>
		<?php include "css/theme.css" ?><?php include "css/style.css" ?>
	</style>

</head>

<body class="animsition">
	<div class="page-wrapper pb-0">
		<!-- HEADER DESKTOP-->
		<header class="header-desktop3 d-none d-lg-block">
			<div class="section__content section__content--p35">
				<div class="header3-wrap">
					<div class="header__logo">
						<div>
							<h1 class="text-white">CMS Home</h1>
						</div>
					</div>
					<div class="header__navbar">
						<ul class="list-unstyled">
							<li>
								<a href="#" class="font-size">
									<i class="fas fa-tachometer-alt"></i>Dashboard
									<span class="bot-line"></span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- END HEADER DESKTOP-->

		<!-- HEADER MOBILE-->
		<header class="header-mobile header-mobile-2 d-block d-lg-none">
			<div class="header-mobile__bar">
				<div class="container-fluid">
					<div class="header-mobile-inner">
						<div>
							<h2 class="text-white">CMS Home</h2>
						</div>
						<button class="hamburger hamburger--slider" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<nav class="navbar-mobile">
				<div class="container-fluid">
					<ul class="navbar-mobile__list list-unstyled">
						<li>
							<a class="js-arrow" href="#">
								<i class="fas fa-tachometer-alt"></i>Dashboard</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- END HEADER MOBILE -->
	</div>

	<!-- PAGE CONTENT-->
	<section class="au-breadcrumb2 pb-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="au-breadcrumb-content">
						<div class="au-breadcrumb-left">
							<span class="au-breadcrumb-span">You are here:</span>
							<ul class="list-unstyled list-inline au-breadcrumb__list">
								<li class="list-inline-item active">Home</li>
								<li class="list-inline-item seprate">
									<span>/</span>
								</li>
								<li class="list-inline-item">Registration</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="my-3">
						<h2 class="heading-section">Get started now</h2>
					</div>
					<div class="login-wrap py-0">
						<form method="post" action="register.php" class="login-form">
							<?php include('errors.php'); ?>
							<span>Select user type:</span>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="user_type" id="employee" value="employee" checked>
								<label class="form-check-label" for="employee">
									Employee
								</label>
							</div>
							<?php

							if ($_SESSION['user_details']['user_type'] == 'admin') {

							?>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="user_type" id="admin" value="admin">
									<label class="form-check-label" for="admin">
										Admin
									</label>
								</div>
							<?php } ?>
							<div id="temp_occupation"></div>
							<div id="occupation">
								<span>Select your occupation:</span>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="occupation" id="court_official" value="court_official" checked>
									<label class="form-check-label" for="court_official">
										Court Official
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="occupation" id="record_officer" value="record_officer">
									<label class="form-check-label" for="record_officer">
										Record Officer
									</label>
								</div>
							</div>
							<div class="form-group mb-3">
								<label class="form-label">First Name</label>
								<input type="text" name="f_name" class="form-control" placeholder="John" required>
							</div>
							<div class="form-group mb-3">
								<label class="form-label">Last Name</label>
								<input type="text" name="l_name" class="form-control" placeholder="Doe" required>
							</div>
							<div class="form-group mb-3">
								<label class="form-label">Phone Number</label>
								<input type="text" name="phone_number" class="form-control" placeholder="0712345678" minlength="10" required>
							</div>
							<div class="form-group mb-3">
								<label class="form-label">Username</label>
								<input type="text" name="username" value="<?php echo $username; ?>" class="form-control" placeholder="john" required>
							</div>
							<div class="form-group mb-3">
								<label class="form-label">Email</label>
								<input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="johndoe@example.com" required>
							</div>
							<div class="form-group mb-3">
								<label class="form-label">Password</label>
								<input type="password" name="password" class="form-control" placeholder="********" minlength="8" autocomplete="new-password" required>
							</div>
							<div class="form-group mb-3">
								<label class="form-label">Confirm password</label>
								<input type="password" name="confirm_password" class="form-control" placeholder="********" minlength="8" autocomplete="new-password" required>
							</div>
							<div class="form-group mb-3">
								<button type="submit" name="reg_user" class="btn form-control btn-primary rounded submit px-3 btn-custom">Sign Up</button>
							</div>
						</form>
						<div class="w-100 my-4 text">
							<p class="mb-0">Already one of us?</p>
							<a href="./login.php">Login</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- COPYRIGHT-->
	<section class="pt-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="copyright">
						<p>Copyright © 2022 CMS. All rights reserved. Alvin Awuor.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END COPYRIGHT-->

	<!-- Jquery JS-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- Bootstrap JS-->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- Vendor JS       -->
	<script src="vendor/animsition/animsition.min.js"></script>

	<!-- Main JS-->
	<script src="js/main.js"></script>

	<!-- Script JS -->
	<script src="js/script.js"></script>

</body>

</html>