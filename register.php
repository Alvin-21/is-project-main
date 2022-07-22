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
        <div class="header">
            <!-- <h2>Register</h2> -->
        </div>  
        <!-- <form method="post" action="register.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="input-group">
  	            <label>Email</label>
  	            <input type="email" name="email" value="<?php echo $email; ?>">
        	</div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <label>Confirm password</label>
                <input type="password" name="confirm_password">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="reg_user">Register</button>
            </div>
            <p>
                Already one of us? <a href="login.php" class="reg">Login</a>
            </p>
        </form> -->

        <section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center my-3">
						<h2 class="heading-section">Get started now</h2>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap py-0">
							<h3 class="text-center mb-0">Welcome</h3>
							<p class="text-center">Register by entering the information below</p>
							<form method="post" action="register.php" class="login-form">
								<?php include('errors.php'); ?>
								<span>Select the type of user:</span>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="user_type" id="regular_user" value="1" checked>
									<label class="form-check-label" for="regular_user">
										Regular User
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="user_type" id="admin" value="2">
									<label class="form-check-label" for="admin">
										Admin
									</label>
								</div>
								<div class="form-group mb-3">
									<label class="form-label">Username</label>
									<input type="text" name="username" value="<?php echo $username; ?>" class="form-control" placeholder="Username" required>
								</div>
                                <div class="form-group mb-3">
									<label class="form-label">Email</label>
									<input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="jane@example.com" required>
								</div>
								<div class="form-group mb-3">
									<label class="form-label">Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>
                                <div class="form-group mb-3">
									<label class="form-label">Confirm password</label>
									<input type="text" name="confirm_password" class="form-control" placeholder="Password" required>
								</div>
								<div class="form-group mb-3">
									<button type="submit" name="reg_user" class="btn form-control btn-primary rounded submit px-3 btn-custom">Sign Up</button>
								</div>
							</form>
							<div class="w-100 text-center my-4 text">
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