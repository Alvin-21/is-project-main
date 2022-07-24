<?php include('process.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<style>
			<?php include "style.css" ?>
		</style>
        <title>CMS | Registration</title>
    </head>
    <body>
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
								<div class="form-check">
									<input class="form-check-input" type="radio" name="user_type" id="admin" value="admin">
									<label class="form-check-label" for="admin">
										Admin
									</label>
								</div>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>